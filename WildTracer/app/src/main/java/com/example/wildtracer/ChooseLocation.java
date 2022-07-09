package com.example.wildtracer;


import android.content.Intent;
import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;


import android.content.res.AssetManager;
import android.os.Bundle;
import android.view.View;
import android.widget.Toast;

import java.io.BufferedReader;
import java.io.FileInputStream;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.util.LinkedList;

public class ChooseLocation extends AppCompatActivity{

    private RecyclerView mRecyclerView;
    private com.example.wildtracer.LocationAdapter mAdapter;

    private LinkedList<String> mWordList = new LinkedList<>();


    //String [] loc = {"শারশা", "যশোর", "খুলনা", "সাতখিরা"};

    static String location;
    static String message = "";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(null);
        setContentView(R.layout.choose_location);


        // Put initial data into the word list.
        try {
            FileInputStream fin = openFileInput("location.txt");
            BufferedReader reader = new BufferedReader(new InputStreamReader(fin));
            while(reader.ready()) {
                String line = reader.readLine();
                mWordList.addLast(line);
            }
            reader.close();
            fin.close();
        } catch (Exception e) {

        }


        // Create recycler view.
        mRecyclerView = findViewById(R.id.recyclerview);
        // Create an adapter and supply the data to be displayed.
        mAdapter = new com.example.wildtracer.LocationAdapter(this, mWordList);
        // Connect the adapter with the recycler view.
        mRecyclerView.setAdapter(mAdapter);
        // Give the recycler view a default layout manager.
        mRecyclerView.setLayoutManager(new LinearLayoutManager(this));

        if (savedInstanceState == null) {
            Bundle extras = getIntent().getExtras();
            if(extras == null) {
                message = "";
            } else {
                message = message + extras.getString("message");
                Toast.makeText(this,message,Toast.LENGTH_LONG).show();
            }
        } else {
            message = message + (String) savedInstanceState.getSerializable("message");
            Toast.makeText(this,message,Toast.LENGTH_LONG).show();
        }
    }

    public static void sendSms(String message1) {
        location = message + " " + message1;
    }

    public void Location_chosen(View view) {
        Intent in = new Intent(ChooseLocation.this, SelectOptions.class);
        in.putExtra("message", location);
        in.addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP);
        this.startActivity(in);
        location = "";
        finish();
    }

    @Override
    public void onBackPressed() {
        moveTaskToBack(true);
        Intent in = new Intent(this, SelectOptions.class);
        this.startActivityIfNeeded(in,0);
        this.finish();
    }
}

