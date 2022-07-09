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
import java.util.LinkedList;

public class ChooseMeetPlace extends AppCompatActivity {
    private LinkedList<String> mMeetList = new LinkedList<>();

    private RecyclerView mRecyclerView;
    private com.example.wildtracer.MeetPlaceAdapter mAdapter;

    //String [] meet = {"ডিসি ইকো পার্ক থেকে গোংরা বর্ডার", "মোযাফফের গার্ডেন রোড থেকে রুদ্রাপুর বর্ডার", "সাতক্ষীরা থেকে ভোমরা নাদিয়া বর্ডার", "সাতক্ষীরা থেকে ভোমরা ঘোনা বর্ডার", "কলারোয়া উপজেলা থেকে তুশখালি বর্ডার"};

    private static String meeting;
    static String message = "";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(null);
        setContentView(R.layout.choose_meet);

        // Put initial data into the word list.
        try {
            FileInputStream fin = openFileInput("route.txt");
            BufferedReader reader = new BufferedReader(new InputStreamReader(fin));
            while(reader.ready()) {
                String line = reader.readLine();
                mMeetList.addLast(line);
            }
            reader.close();
            fin.close();
        } catch (Exception e) {

        }

        // Create recycler view.
        mRecyclerView = findViewById(R.id.recyclerview);
        // Create an adapter and supply the data to be displayed.
        mAdapter = new com.example.wildtracer.MeetPlaceAdapter(this, mMeetList);
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

    public static void meetSms(String message1) {
        meeting = message + " " + message1;
    }

    public void Meet_chosen(View view) {
        Intent i=new Intent(ChooseMeetPlace.this, ChooseSecondMeetPlace.class);
        i.putExtra("message", meeting);
        ChooseMeetPlace.this.startActivity(i);
        meeting = "";
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