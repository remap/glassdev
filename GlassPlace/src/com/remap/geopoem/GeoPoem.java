package com.remap.geopoem;

import com.littlefluffytoys.littlefluffylocationlibrary.LocationLibrary;

import android.app.Application;
import android.util.Log;


public class GeoPoem extends Application {
	
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
        Log.d("GeoPoem","onCreate()");
        LocationLibrary.showDebugOutput(true);
        
        try {
        	//LocationLibrary.initialiseLibrary(getBaseContext(), "com.remap.geopoem");
        	// the above 'normal' is probably fine; but for starters we'll do a broadcast every 1 min, force if none for 2 min..
        	// 60 * 1000, 2 * 60 * 1000
        	// LocationLibrary.initialiseLibrary(getBaseContext(), 60 * 1000, 2 * 60 * 1000, "com.remap.geopoem");
        	LocationLibrary.initialiseLibrary(getBaseContext(), 10 * 1000, 1 * 30 * 1000, "com.remap.geopoem");
        } catch (UnsupportedOperationException ex) {
            Log.d("TestApplication", "UnsupportedOperationException thrown - the device doesn't have any location providers");
        }

    }
}