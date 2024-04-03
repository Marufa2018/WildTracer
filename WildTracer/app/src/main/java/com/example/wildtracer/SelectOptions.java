package com.example.wildtracer;

import android.annotation.SuppressLint;
import android.annotation.TargetApi;
import android.content.ComponentName;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.content.pm.ResolveInfo;
import android.database.Cursor;
import android.net.Uri;
import android.os.Build;
import android.os.Bundle;
import android.os.Parcelable;
import android.provider.MediaStore;
import android.telephony.SmsManager;
import android.text.TextUtils;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;
import androidx.core.app.ActivityCompat;

import java.io.File;
import java.util.ArrayList;
import java.util.List;

public class SelectOptions extends AppCompatActivity {

    private Button mLocationButton;
    private Button mWildlifeButton;
    private Button mMeetButton;
    private Button mDownloadButton;
    private TextView mMessageTextView;
    private EditText mEditWordView;
    String message = "";

    Uri picUri;

    private ArrayList<String> permissionsToRequest;
    private ArrayList<String> permissionsRejected = new ArrayList<>();
    private ArrayList<String> permissions = new ArrayList<>();

    private final static int ALL_PERMISSIONS_RESULT = 107;
    private final static int IMAGE_RESULT = 200;

    public static final String KEY_User_Document1 = "doc1";
    ImageView IDProf;
    Button Upload_Btn;

    private String Document_img1="";


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(null);
        setContentView(R.layout.select_options);

        mLocationButton = findViewById(R.id.button_loc);
        mWildlifeButton = findViewById(R.id.button_wildlife);
        mMeetButton = findViewById(R.id.button_meet);
        mMessageTextView = findViewById(R.id.textView2);
        mDownloadButton = findViewById(R.id.button_download);
        mEditWordView = findViewById(R.id.edit_word);


        mDownloadButton.setOnClickListener(new View.OnClickListener() {
            /**
             * Download data.
             * @param v The download button.
             */
            @Override
            public void onClick(View v) {
                Intent in = new Intent(getApplicationContext(), DownloadData.class);
                startActivity(in);
                finish();

                Intent in2 = new Intent(getApplicationContext(), DownloadData_location.class);
                startActivity(in2);
                finish();

                Intent in3 = new Intent(getApplicationContext(), DownloadDataRoute.class);
                startActivity(in3);
                finish();

                Intent in4 = new Intent(getApplicationContext(), RestartMessage.class);
                startActivity(in4);

            }
        });

        mLocationButton.setOnClickListener(new View.OnClickListener() {
            /**
             * Toggle the tracking state.
             * @param v The track location button.
             */
            @Override
            public void onClick(View v) {
                Intent in = new Intent(getApplicationContext(), ChooseLocation.class);
                in.putExtra("message", message);
                startActivity(in);
                finish();
            }
        });


        mWildlifeButton.setOnClickListener(new View.OnClickListener() {
            /**
             * Toggle the tracking state.
             * @param v The track location button.
             */
            @Override
            public void onClick(View v) {
                Intent in = new Intent(getApplicationContext(), ChooseWildlife.class);
                in.putExtra("message", message);
                startActivity(in);
                finish();
            }
        });

        mMeetButton.setOnClickListener(new View.OnClickListener() {
            /**
             * Toggle the tracking state.
             * @param v The track location button.
             */
            @Override
            public void onClick(View v) {
                Intent in = new Intent(getApplicationContext(), ChooseMeetPlace.class);
                in.putExtra("message", message);
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
            }
        } else {
            message = message + (String) savedInstanceState.getSerializable("message");
            Toast.makeText(this,message,Toast.LENGTH_LONG).show();
        }
        mMessageTextView.setText(message);


        /*IDProf=(ImageView)findViewById(R.id.imageView1);
        Upload_Btn=(Button)findViewById(R.id.button_pic);

        Upload_Btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                startActivityForResult(getPickImageChooserIntent(), IMAGE_RESULT);
            }
        });

        permissions.add(CAMERA);
        permissions.add(WRITE_EXTERNAL_STORAGE);
        permissions.add(READ_EXTERNAL_STORAGE);
        permissionsToRequest = findUnAskedPermissions(permissions);



        if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.M) {


            if (permissionsToRequest.size() > 0)
                requestPermissions(permissionsToRequest.toArray(new String[permissionsToRequest.size()]), ALL_PERMISSIONS_RESULT);
        }*/

    }

    public void SendSMS(View view) {

        ActivityCompat.requestPermissions(this,new String[]{android.Manifest.permission.SEND_SMS},1);
        if (TextUtils.isEmpty(mEditWordView.getText())) {
            String word = mEditWordView.getText().toString();
            message = message + " অতিরিক্ত তথ্য: " + word;
        }
        try{
            android.telephony.SmsManager smgr = SmsManager.getDefault();
            smgr.sendTextMessage("+8801716300807","5554", message,null,null);
            Intent in = new Intent(this,SuccessSMS.class);
            in.putExtra("message", message);
            startActivity(in);
        }
        catch (Exception e){
        }
    }

        public Intent getPickImageChooserIntent() {

            Uri outputFileUri = getCaptureImageOutputUri();

            List<Intent> allIntents = new ArrayList<>();
            PackageManager packageManager = getPackageManager();

            Intent captureIntent = new Intent(MediaStore.ACTION_IMAGE_CAPTURE);
            List<ResolveInfo> listCam = packageManager.queryIntentActivities(captureIntent, 0);
            for (ResolveInfo res : listCam) {
                Intent intent = new Intent(captureIntent);
                intent.setComponent(new ComponentName(res.activityInfo.packageName, res.activityInfo.name));
                intent.setPackage(res.activityInfo.packageName);
                if (outputFileUri != null) {
                    intent.putExtra(MediaStore.EXTRA_OUTPUT, outputFileUri);
                }
                allIntents.add(intent);
            }

            Intent galleryIntent = new Intent(Intent.ACTION_GET_CONTENT);
            galleryIntent.setType("image/*");
            List<ResolveInfo> listGallery = packageManager.queryIntentActivities(galleryIntent, 0);
            for (ResolveInfo res : listGallery) {
                Intent intent = new Intent(galleryIntent);
                intent.setComponent(new ComponentName(res.activityInfo.packageName, res.activityInfo.name));
                intent.setPackage(res.activityInfo.packageName);
                allIntents.add(intent);
            }

            Intent mainIntent = allIntents.get(allIntents.size() - 1);
            for (Intent intent : allIntents) {
                if (intent.getComponent().getClassName().equals("com.example.wildtracer.SelectOptions")) {
                    mainIntent = intent;
                    break;
                }
            }
            allIntents.remove(mainIntent);

            Intent chooserIntent = Intent.createChooser(mainIntent, "Select source");
            chooserIntent.putExtra(Intent.EXTRA_INITIAL_INTENTS, allIntents.toArray(new Parcelable[allIntents.size()]));

            return chooserIntent;
        }


        private Uri getCaptureImageOutputUri() {
            Uri outputFileUri = null;
            File getImage = getExternalFilesDir("");
            if (getImage != null) {
                outputFileUri = Uri.fromFile(new File(getImage.getPath(), "profile.png"));
            }
            return outputFileUri;
        }

        /*@Override
        protected void onActivityResult(int requestCode, int resultCode, Intent data) {


            super.onActivityResult(requestCode, resultCode, data);
            if (resultCode == Activity.RESULT_OK) {

                ImageView imageView = findViewById(R.id.imageView1);

                if (requestCode == IMAGE_RESULT) {

                    String filePath = getImageFilePath(data);
                    if (filePath != null) {
                        Bitmap selectedImage = BitmapFactory.decodeFile(filePath);
                        imageView.setImageBitmap(selectedImage);
                        MediaStore.Images.Media.insertImage(getContentResolver(), selectedImage, "Pic_new.png" , "yourDescription");
                    }
                }

            }

        }*/


        private String getImageFromFilePath(Intent data) {
            boolean isCamera = data == null || data.getData() == null;

            if (isCamera) return getCaptureImageOutputUri().getPath();
            else return getPathFromURI(data.getData());

        }

        public String getImageFilePath(Intent data) {
            return getImageFromFilePath(data);
        }

        private String getPathFromURI(Uri contentUri) {
            String[] proj = {MediaStore.Audio.Media.DATA};
            Cursor cursor = getContentResolver().query(contentUri, proj, null, null, null);
            int column_index = cursor.getColumnIndexOrThrow(MediaStore.Audio.Media.DATA);
            cursor.moveToFirst();
            return cursor.getString(column_index);
        }

        @Override
        protected void onSaveInstanceState(Bundle outState) {
            super.onSaveInstanceState(outState);

            outState.putParcelable("pic_uri", picUri);
        }

        @Override
        protected void onRestoreInstanceState(Bundle savedInstanceState) {
            super.onRestoreInstanceState(savedInstanceState);

            // get the file url
            picUri = savedInstanceState.getParcelable("pic_uri");
        }

        private ArrayList<String> findUnAskedPermissions(ArrayList<String> wanted) {
            ArrayList<String> result = new ArrayList<String>();

            for (String perm : wanted) {
                if (!hasPermission(perm)) {
                    result.add(perm);
                }
            }

            return result;
        }

        private boolean hasPermission(String permission) {
            if (canMakeSmores()) {
                if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.M) {
                    return (checkSelfPermission(permission) == PackageManager.PERMISSION_GRANTED);
                }
            }
            return true;
        }

        private void showMessageOKCancel(String message, DialogInterface.OnClickListener okListener) {
            new AlertDialog.Builder(this)
                    .setMessage(message)
                    .setPositiveButton("OK", okListener)
                    .setNegativeButton("Cancel", null)
                    .create()
                    .show();
        }

        private boolean canMakeSmores() {
            return (Build.VERSION.SDK_INT > Build.VERSION_CODES.LOLLIPOP_MR1);
        }

        @SuppressLint("MissingSuperCall")
        @TargetApi(Build.VERSION_CODES.M)
        @Override
        public void onRequestPermissionsResult(int requestCode, String[] permissions, int[] grantResults) {

            switch (requestCode) {

                case ALL_PERMISSIONS_RESULT:
                    for (String perms : permissionsToRequest) {
                        if (!hasPermission(perms)) {
                            permissionsRejected.add(perms);
                        }
                    }

                    if (permissionsRejected.size() > 0) {


                        if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.M) {
                            if (shouldShowRequestPermissionRationale(permissionsRejected.get(0))) {
                                showMessageOKCancel("These permissions are mandatory for the application. Please allow access.",
                                        new DialogInterface.OnClickListener() {
                                            @Override
                                            public void onClick(DialogInterface dialog, int which) {
                                                if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.M) {


                                                    requestPermissions(permissionsRejected.toArray(new String[permissionsRejected.size()]), ALL_PERMISSIONS_RESULT);
                                                }
                                            }
                                        });
                                return;
                            }
                        }

                    }

                    break;
            }

        }

    @Override
    public void onBackPressed() {
        moveTaskToBack(true);
        Intent in = new Intent(this, MainActivity.class);
        this.startActivityIfNeeded(in,0);
        SelectOptions.this.finish();
    }

}
