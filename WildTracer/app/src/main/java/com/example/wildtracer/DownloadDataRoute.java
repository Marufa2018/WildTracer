package com.example.wildtracer;

import android.content.Context;
import android.content.SharedPreferences;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.os.Bundle;
import android.widget.EditText;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;
import androidx.loader.app.LoaderManager;
import androidx.loader.content.Loader;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.FileOutputStream;
import java.util.LinkedList;

public class DownloadDataRoute extends AppCompatActivity implements LoaderManager.LoaderCallbacks<String>{

    private EditText mBookInput;
    private TextView mTitleText;
    //private TextView mAuthorText;
    static LinkedList<String> titleList = new LinkedList<>();
   // static LinkedList <String> authorsList = new LinkedList<>();
    static LinkedList <String> idList = new LinkedList<>();

    // Key for current title
    private final String TITLE_KEY = "name";
    // Key for current author
   // private final String AUTHORS_KEY = "name";

    // Shared preferences object
    private SharedPreferences mPreferences;

    // Name of shared preferences file
    private String sharedPrefFile =
            "com.example.android.hellosharedprefs";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.download_data);

        mTitleText = findViewById(R.id.titleText);
       // mAuthorText = findViewById(R.id.authorText);
        mPreferences = getSharedPreferences(sharedPrefFile, MODE_PRIVATE);

        if (getSupportLoaderManager().getLoader(0) != null) {
            getSupportLoaderManager().initLoader(0, null, this);
        }

        String queryString = null;


        // Check the status of the network connection.
        ConnectivityManager connMgr = (ConnectivityManager)
                getSystemService(Context.CONNECTIVITY_SERVICE);
        NetworkInfo networkInfo = null;
        if (connMgr != null) {
            networkInfo = connMgr.getActiveNetworkInfo();
        }

        // If the network is available, connected, and the search field
        // is not empty, start a BookLoader AsyncTask.
        if (networkInfo != null && networkInfo.isConnected()) {

            Bundle queryBundle = new Bundle();
            queryBundle.putString("queryString", null);
            getSupportLoaderManager().restartLoader(0, queryBundle, this);

            mTitleText.setText(R.string.loading);
        }
        // Otherwise update the TextView to tell the user there is no
        // connection, or no search term.
      /*  else {
            if (queryString.length() == 0) {
                mAuthorText.setText("");
                mTitleText.setText(R.string.no_search_term);
            } else {
                mAuthorText.setText("");
                mTitleText.setText(R.string.no_network);
            }
        }*/
    }


    @NonNull
    @Override
    public Loader<String> onCreateLoader(int id, @Nullable Bundle args) {
        String queryString = "";

        if (args != null) {
            queryString = args.getString("queryString");
        }

        return new RouteLoader(this, queryString);
    }



    @Override
    public void onLoadFinished(@NonNull Loader<String> loader, String data) {

        try {
            // Convert the response into a JSON object.
            JSONObject jsonObject = new JSONObject(data);
            // Get the JSONArray of book items.
            JSONArray itemsArray = jsonObject.getJSONArray("route");

            // Initialize iterator and results fields.
            int i = 0;
            String title = null;
            //String authors = null;
            String id = null;

            FileOutputStream fOut = openFileOutput("route.txt",Context.MODE_PRIVATE);

            // Look for results in the items array, exiting when both the
            // title and author are found or when all items have been checked.
            while (i < itemsArray.length() &&
                    (i < 20)) {
                // Get the current item information.
                JSONObject book = itemsArray.getJSONObject(i);

                // Try to get the author and title from the current item,
                // catch if either field is empty and move on.
                try {
                    title = book.getString("name");
                    //authors = book.getString("scientific_name");
                    id = book.getString("id");

                    titleList.add(title);
                    //authorsList.add(authors);
                    idList.add(id);

                    fOut.write(title.getBytes());
                    fOut.write("\n".getBytes());
                } catch (JSONException e) {
                    e.printStackTrace();
                }

                // Move to the next item.
                i++;
            }



            fOut.close();


        } catch (Exception e) {
            // If onPostExecute does not receive a proper JSON string,
            // update the UI to show failed results.
            mTitleText.setText(R.string.no_results);
           // mAuthorText.setText("");
            e.printStackTrace();
        }

    }

    @Override
    protected void onPause() {
        super.onPause();

        SharedPreferences.Editor preferencesEditor = mPreferences.edit();
        preferencesEditor.putString(TITLE_KEY, titleList.toString());
        //preferencesEditor.putString(AUTHORS_KEY, authorsList.toString());
        preferencesEditor.apply();

    }

    @Override
    public void onLoaderReset(@NonNull Loader<String> loader) {
        // Do nothing.  Required by interface.
    }
}
