package com.example.wildtracer;

import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import org.apache.commons.io.FileUtils;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import java.io.File;

public class SuccessSMS extends AppCompatActivity {
    private Button mMainButton;
    private TextView mMessageTextView;
    private TextView mSuccessTextView;
    String message = "";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(null);
        setContentView(R.layout.success_sms);

        mMainButton = findViewById(R.id.button_main);
        mMessageTextView = findViewById(R.id.textView_sms);
        mSuccessTextView = findViewById(R.id.textView_success);

        mMainButton.setOnClickListener(new View.OnClickListener() {
            /**
             * Toggle the tracking state.
             *
             * @param v The track location button.
             */
            @Override
            public void onClick(View v) {
                message = "";
                Intent in = new Intent(getApplicationContext(), MainActivity.class);
                startActivity(in);
                finish();
            }
        });

        if (savedInstanceState == null) {
            Bundle extras = getIntent().getExtras();
            if(extras == null) {
                message = "";
            } else {
                message = message + extras.getString("message");
                Toast.makeText(this,message,Toast.LENGTH_LONG).show();
                mMessageTextView.setText(message);
                mSuccessTextView.setText(R.string.success_sms);
                message = "";
            }
        } else {
            message = message + (String) savedInstanceState.getSerializable("message");
            Toast.makeText(this,message,Toast.LENGTH_LONG).show();
            mMessageTextView.setText(message);
            mSuccessTextView.setText(R.string.success_sms);
            message = "";
        }
    }

    public static void deleteCache(Context context) {
        try {
            File dir = context.getCacheDir();
            deleteDir(dir);
        } catch (Exception e) { e.printStackTrace();}
    }

    public static boolean deleteDir(File dir) {
        if (dir != null && dir.isDirectory()) {
            String[] children = dir.list();
            for (int i = 0; i < children.length; i++) {
                boolean success = deleteDir(new File(dir, children[i]));
                if (!success) {
                    return false;
                }
            }
            return dir.delete();
        } else if(dir!= null && dir.isFile()) {
            return dir.delete();
        } else {
            return false;
        }
    }

    @Override
    protected void onDestroy() {
        super.onDestroy();
        deleteCache(getApplicationContext());
        FileUtils.deleteQuietly(getApplicationContext().getCacheDir());
    }
}
