package com.remap.glass;

import com.littlefluffytoys.littlefluffylocationlibrary.LocationInfo;
import com.littlefluffytoys.littlefluffylocationlibrary.LocationLibrary;
import com.littlefluffytoys.littlefluffylocationlibrary.LocationLibraryConstants;

import android.app.AlertDialog;
import android.os.Bundle;
import android.app.Activity;
import android.app.NotificationManager;
import android.util.Log;
import android.view.Menu;
import android.media.MediaPlayer.OnCompletionListener;
import android.net.Uri;
import android.widget.MediaController;
import android.widget.VideoView;
import android.view.Window;
import android.view.WindowManager;
import android.content.BroadcastReceiver;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.IntentFilter;

public class VideoplayerActivity extends Activity {
	//LocationLibrary.initialiseLibrary(getBaseContext(), "com.remap.geopoem");
	public MediaController mediaController;
	private VideoView videoView;
	public String oldLast = "";
	private LocationInfo latestInfo;
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		// remove title
		requestWindowFeature(Window.FEATURE_NO_TITLE);
        getWindow().setFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN,
            WindowManager.LayoutParams.FLAG_FULLSCREEN);
        // do the normal context references from resource
		setContentView(R.layout.activity_videoplayer);
		videoView =(VideoView)findViewById(R.id.videoView);
		makeMediaPlayer();
		playVideo();
	}
	
	public boolean makeMediaPlayer(){
		// make media controller
	    mediaController= new MediaController(this);
	    mediaController.setAnchorView(videoView);    
	    mediaController.setBackgroundColor(getResources().getColor(R.color.black));
	    videoView.setMediaController(mediaController);
	    
		return true;
	}
	
	public boolean playVideo(){
	    Uri uri=Uri.parse("android.resource://"+getPackageName()+"/"+R.raw.car);     
	    videoView.setVideoURI(uri);        
	    videoView.requestFocus();
	    videoView.start();
	    videoView.setOnCompletionListener(videoOver());
		return true;
	}
	
    protected OnCompletionListener videoOver(){
    	// for some reason this fails... 
    	// goal is to make the video disappear after playback. 
    	//videoView.stopPlayback();
		return null;
    }
	
	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		//getMenuInflater().inflate(R.menu.videoplayer, menu);
		return true;
	}

	 private void refreshDisplay() {
		 LocationLibrary.forceLocationUpdate(this);
	        refreshDisplay(new LocationInfo(this));
	    }

	private void refreshDisplay(final LocationInfo locationInfo) {
	    	//locationInfo.refresh(this);
	    	latestInfo = new LocationInfo(getBaseContext());
	    	Log.d("GeoPoem","checking GPS coord / refreshing display...");
	  	  
	    	String lastLat = Float.toString(locationInfo.lastLat);
	    	String lastLong = Float.toString(locationInfo.lastLong);
	    	String lastSampleTime = LocationInfo.formatTimeAndDay(locationInfo.lastLocationUpdateTimestamp, true);
	    	String lastAccuracy = Integer.toString(locationInfo.lastAccuracy);

	    	
			new AlertDialog.Builder(this)
		    .setTitle("Geo update")
		    .setMessage(lastSampleTime+" at ("+lastLat+","+lastLong+") with "+lastAccuracy+" m accuracy \n"+oldLast)
		    .setPositiveButton("OK!", new DialogInterface.OnClickListener() {
	           public void onClick(DialogInterface dialog, int id) {
	               // User clicked OK button
	           }
		    	})
		     .show();
			
			oldLast = lastSampleTime+" at ("+lastLat+","+lastLong+") with "+lastAccuracy+" m accuracy";
	    	
	  }
	
	
    @Override
    public void onResume() {
        super.onResume();

        // cancel any notification we may have received from TestBroadcastReceiver
        ((NotificationManager) getSystemService(Context.NOTIFICATION_SERVICE)).cancel(1234);
        
        refreshDisplay();

        // This demonstrates how to dynamically create a receiver to listen to the location updates.
        // You could also register a receiver in your manifest.
        final IntentFilter lftIntentFilter = new IntentFilter(LocationLibraryConstants.getLocationChangedPeriodicBroadcastAction());
        registerReceiver(lftBroadcastReceiver, lftIntentFilter);
   }
    
    @Override
    public void onPause() {
        super.onPause();
        
        unregisterReceiver(lftBroadcastReceiver);
   }
    
    private final BroadcastReceiver lftBroadcastReceiver = new BroadcastReceiver() {
        @Override
        public void onReceive(Context context, Intent intent) {
        	Log.w("GeoPoem","GEO BROADCAST RECEIVED");
            // extract the location info in the broadcast
            final LocationInfo locationInfo = (LocationInfo) intent.getSerializableExtra(LocationLibraryConstants.LOCATION_BROADCAST_EXTRA_LOCATIONINFO);
            // refresh the display with it
            refreshDisplay(locationInfo);
        }
    };
	
}
