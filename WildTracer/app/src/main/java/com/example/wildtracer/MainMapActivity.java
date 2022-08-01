package com.example.wildtracer;


import android.Manifest.permission;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.location.Location;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import androidx.core.app.ActivityCompat;
import androidx.core.content.ContextCompat;

import com.google.android.gms.maps.GoogleMap;
import com.google.android.gms.maps.OnMapReadyCallback;
import com.google.android.gms.maps.SupportMapFragment;
import com.google.android.gms.maps.model.LatLng;
import com.google.android.gms.maps.model.Marker;
import com.google.android.gms.maps.model.MarkerOptions;


public class MainMapActivity extends AppCompatActivity
            implements
        GoogleMap.OnMarkerClickListener,
        GoogleMap.OnMyLocationButtonClickListener,
        GoogleMap.OnMyLocationClickListener,
            OnMapReadyCallback,
            ActivityCompat.OnRequestPermissionsResultCallback {

        /**
         * Request code for location permission request.
         *
         * @see #onRequestPermissionsResult(int, String[], int[])
         */
        private static final int LOCATION_PERMISSION_REQUEST_CODE = 1;

        /**
         * Flag indicating whether a requested permission has been denied after returning in
         * {@link #onRequestPermissionsResult(int, String[], int[])}.
         */
        private boolean permissionDenied = false;

        private GoogleMap map;
        private Button mMainButton;
        private final LatLng Route1 = new LatLng(24.66417, 89.44081);
        private final LatLng Route2 = new LatLng(24.58694, 89.58389);
        private final LatLng Route3 = new LatLng(24.81464, 89.44611);


    @Override
        protected void onCreate(Bundle savedInstanceState) {
            super.onCreate(savedInstanceState);
            setContentView(R.layout.activity_main_map);

            mMainButton = findViewById(R.id.button_main);


            mMainButton.setOnClickListener(new View.OnClickListener() {
            /**
             * Toggle the tracking state.
             *
             * @param v The track location button.
             */
            @Override
            public void onClick(View v) {
                Intent in = new Intent(getApplicationContext(), MainActivity.class);
                startActivity(in);
                finish();
            }
        });

            SupportMapFragment mapFragment =
                    (SupportMapFragment) getSupportFragmentManager().findFragmentById(R.id.map);
            mapFragment.getMapAsync(this);
        }

        @Override
        public void onMapReady(GoogleMap googleMap) {
            map = googleMap;
            map.setOnMyLocationButtonClickListener(this);
            map.setOnMyLocationClickListener(this);

            Marker markerRoute1 = map.addMarker(new MarkerOptions()
                    .position(Route1)
                    .title("Route1"));
            markerRoute1.setTag(0);

            Marker markerRoute2 = map.addMarker(new MarkerOptions()
                    .position(Route2)
                    .title("Route2"));
            markerRoute2.setTag(0);

            Marker markerRoute3 = map.addMarker(new MarkerOptions()
                    .position(Route3)
                    .title("Route3"));
            markerRoute3.setTag(0);

            // Set a listener for marker click.
            map.setOnMarkerClickListener(this);
            enableMyLocation();
        }

        /**
         * Enables the My Location layer if the fine location permission has been granted.
         */
        private void enableMyLocation() {
            // [START maps_check_location_permission]
            if (ContextCompat.checkSelfPermission(this, permission.ACCESS_FINE_LOCATION)
                    == PackageManager.PERMISSION_GRANTED) {
                if (map != null) {
                    map.setMyLocationEnabled(true);
                }


            }
            // [END maps_check_location_permission]
        }

        @Override
        public boolean onMyLocationButtonClick() {
            Toast.makeText(this, "MyLocation button clicked", Toast.LENGTH_SHORT).show();
            // Return false so that we don't consume the event and the default behavior still occurs
            // (the camera animates to the user's current position).
            return false;
        }

        @Override
        public void onMyLocationClick(@NonNull Location location) {
            Toast.makeText(this, "Current location:\n" + location, Toast.LENGTH_LONG).show();
        }

        // [START maps_check_location_permission_result]
        @Override
        public void onRequestPermissionsResult(int requestCode, @NonNull String[] permissions, @NonNull int[] grantResults) {
            super.onRequestPermissionsResult(requestCode, permissions, grantResults);
            if (requestCode != LOCATION_PERMISSION_REQUEST_CODE) {
                return;
            }

            if (ContextCompat.checkSelfPermission(this, permission.ACCESS_FINE_LOCATION)
                    == PackageManager.PERMISSION_GRANTED) {
                // Enable the my location layer if the permission has been granted.
                enableMyLocation();
            } else {
                // Permission was denied. Display an error message
                // [START_EXCLUDE]
                // Display the missing permission error dialog when the fragments resume.
                permissionDenied = true;
                // [END_EXCLUDE]
            }
        }
        // [END maps_check_location_permission_result]

        @Override
        protected void onResumeFragments() {
            super.onResumeFragments();
            if (permissionDenied) {
                // Permission was not granted, display error dialog.
                showMissingPermissionError();
                permissionDenied = false;
            }
        }

        /**
         * Displays a dialog with error message explaining that the location permission is missing.
         */
        private void showMissingPermissionError() {
            Toast.makeText(this, "Permission Required",
                    Toast.LENGTH_SHORT).show();;
        }

    @Override
    public void onBackPressed() {
        moveTaskToBack(true);
        Intent in = new Intent(this, MainActivity.class);
        this.startActivityIfNeeded(in,0);
        MainMapActivity.this.finish();
    }


    @Override
    public boolean onMarkerClick(@NonNull Marker marker) {
        return false;
    }
}