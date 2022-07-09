package com.example.wildtracer;

import android.content.Intent;
import android.os.Bundle;
import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.telephony.SmsManager;
import android.view.View;
import android.widget.Toast;

import java.io.BufferedReader;
import java.io.FileInputStream;
import java.io.InputStreamReader;
import java.util.ArrayList;
import java.util.LinkedList;

public class ChooseWildlife extends AppCompatActivity {
    private final LinkedList<String> mWordList = new LinkedList<>();


    private RecyclerView mRecyclerView;
    private com.example.wildtracer.WildLifeAdapter mAdapter;

   // String [] wilds = {"সিরাজি কবুতর", "বিদেশী রাজহাঁস", "অ্যালবিনো সাদা ময়ূর", "ককাটুস", "ভোঁদড়", "খরগোশ", "ঈগল", "গেকো", "কোবরা", "হরিণ", "বন্য খরগোশ"};

    static String wildlife;
    static String message = "";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(null);
        setContentView(R.layout.choose_wildlife);

        // Put initial data into the word list.
        try {
            FileInputStream fin = openFileInput("title.txt");
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
        mAdapter = new com.example.wildtracer.WildLifeAdapter(this, mWordList);
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

    public static void wildlifeSms(String message1) {
        wildlife = message + " " + message1;
    }

    public void Wildlife_chosen(View view) {
        Intent in = new Intent(ChooseWildlife.this, com.example.wildtracer.SelectOptions.class);
        in.putExtra("message", wildlife);
        ChooseWildlife.this.startActivity(in);
        wildlife = "";
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
