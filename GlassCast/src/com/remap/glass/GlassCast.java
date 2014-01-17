package com.remap.glass;

import android.app.Application;
import android.util.Log;


public class GlassCast extends Application {
	
	// singleton
	/*	
    private static GeoPoem s_instance;

    public GeoPoem()
    {
        s_instance = this;
    }

    public static GeoPoem getApplication()
    {
        return s_instance;
    }
    
	*/
	
@Override
    public void onCreate() {
        super.onCreate();
        // log stuff
        Log.d("GlassCast","onCreate()");
    }
}