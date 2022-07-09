package com.example.wildtracer;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import java.util.LinkedList;

public class ChooseSecondMeetPlace extends AppCompatActivity {
    private LinkedList<String> mMeetList = new LinkedList<>();

    private RecyclerView mRecyclerView;
    private com.example.wildtracer.MeetPlaceAdapter mAdapter;

    String [] meet = {"Route 1", "Route 2", "Route 3", "Route 4", "Route 5"};

    private static String secondMeeting;
    static String message = "";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(null);
        setContentView(R.layout.choose_meet);

        // Put initial data into the word list.
        for (int i = 0; i < meet.length; i++) {
            mMeetList.addLast("" + meet[i]);
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
        secondMeeting = message + " " + message1;
    }

    public void Meet_chosen(View view) {
        Intent i=new Intent(this, SelectOptions.class);
        i.putExtra("message", secondMeeting);
        this.startActivity(i);
        secondMeeting = "";
        finish();
    }
}
