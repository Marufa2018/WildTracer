package com.example.wildtracer;

import android.content.Context;

import androidx.annotation.Nullable;
import androidx.loader.content.AsyncTaskLoader;

public class LocationLoader extends AsyncTaskLoader<String> {

    private String mQueryString;

    LocationLoader(Context context, String queryString) {
        super(context);
        mQueryString = queryString;
    }

    @Override
    protected void onStartLoading() {
        super.onStartLoading();

        forceLoad();
    }

    @Nullable
    @Override
    public String loadInBackground() {
        return NetworkUtils_location.getBookInfo(mQueryString);
    }
}
