package com.example.wildtracer;

import android.content.Context;

import androidx.annotation.Nullable;
import androidx.loader.content.AsyncTaskLoader;

public class RouteLoader extends AsyncTaskLoader<String> {

    private String mQueryString;

    RouteLoader(Context context, String queryString) {
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
        return NetworkUtilsRoute.getBookInfo(mQueryString);
    }
}
