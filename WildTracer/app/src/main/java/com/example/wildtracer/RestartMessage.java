package com.example.wildtracer;

import android.os.Bundle;

import androidx.appcompat.app.AppCompatActivity;

public class RestartMessage extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.restart_message);
    };

    @Override
    public void onBackPressed() {
        moveTaskToBack(true);
        RestartMessage.this.finish();
    }
}
