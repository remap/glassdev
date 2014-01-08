package com.remap.glass;

import android.os.Bundle;
import android.app.Activity;
import android.content.Context;
import android.util.Log;
import android.view.Menu;
import android.media.MediaPlayer;
import android.media.MediaPlayer.OnCompletionListener;
import android.media.MediaPlayer.OnInfoListener;
import android.media.MediaPlayer.OnPreparedListener;
import android.net.Uri;
import android.widget.MediaController;
import android.widget.VideoView;
import android.view.MotionEvent;
import android.view.Window;
import android.view.WindowManager;

import com.google.android.glass.touchpad.Gesture;
import com.google.android.glass.touchpad.GestureDetector;


public class VideoplayerActivity extends Activity {
	public MediaController mediaController;
	private VideoView videoView;
	public String oldLast = "";
	private GestureDetector mGestureDetector;
	String VideoURL = "http://ether.remap.ucla.edu/glass/test/3.mp4";
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		
		mGestureDetector = createGestureDetector(this);
		
		// remove title
		requestWindowFeature(Window.FEATURE_NO_TITLE);
        getWindow().setFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN,
            WindowManager.LayoutParams.FLAG_FULLSCREEN);
        
        // do the normal context references from resource
		setContentView(R.layout.activity_videoplayer);
		videoView =(VideoView)findViewById(R.id.videoView);
		
		makeMediaPlayer();
		prepVideo();
	}
	
	public boolean makeMediaPlayer(){
		// make media controller
	    //mediaController= new MediaController(VideoplayerActivity.this);
	    //mediaController.setAnchorView(videoView);    
	    //mediaController.setBackgroundColor(getResources().getColor(R.color.black));
	    //videoView.setMediaController(mediaController);
	    Log.d("Vplayer","media player made");
		return true;
	}
	
	public boolean prepVideo(){
	    //Uri uri=Uri.parse("android.resource://"+getPackageName()+"/"+R.raw.basketball);    
	    Uri uri = Uri.parse(VideoURL);
	         
	    
	    //videoView.start();
	  
		videoView.setOnPreparedListener(new OnPreparedListener() {
			// Close the progress bar and play the video
			public void onPrepared(MediaPlayer mp) {
				Log.d("Vplayer","video ready / prepared");
				videoView.start();
			}
		});
	    videoView.setOnCompletionListener(videoOver());
	    //videoView.setOnInfoListener(videoInfo());
		videoView.setVideoURI(uri);   
		//videoView.requestFocus();
		
		return true;
	}
	
    protected OnInfoListener videoInfo(){
    	// for some reason this failss... 
    	// goal is to make the video disappear after playback. 
    	//videoView.stopPlayback();
    	Log.d("Vplayer","info");
		return null;
    }
	
    protected OnCompletionListener videoOver(){
    	// for some reason this fails... 
    	// goal is to make the video disappear after playback. 
    	//videoView.stopPlayback();
    	Log.d("Vplayer","media complete.");
		return null;
    }
	
	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		//getMenuInflater().inflate(R.menu.videoplayer, menu);
		return true;
	}
	
	
    @Override
    public void onResume() {
        super.onResume();
    }
    
    @Override
    public void onPause() {
        super.onPause();

   }
    
    
    
    // gestures
    
   private GestureDetector createGestureDetector(Context context) {
        GestureDetector gestureDetector = new GestureDetector(context);
            //Create a base listener for generic gestures
        	Log.d("Vplayer","MADE GESTURE DETECTOR");
            gestureDetector.setBaseListener( new GestureDetector.BaseListener() {
                @Override
                public boolean onGesture(Gesture gesture) {
                    if (gesture == Gesture.TAP) {
                        // do something on tap
                    	 Log.d("Vplayer","tapping...)");
                    	 VideoURL = "http://ether.remap.ucla.edu/glass/test/1.mp4";
                    	 prepVideo();
                        return true;
                    } else if (gesture == Gesture.TWO_TAP) {
                        // do something on two finger tap
                    	Log.d("Vplayer","two tap");
                   	 	VideoURL = "http://ether.remap.ucla.edu/glass/test/2.mp4";
                   		 prepVideo();
                        return true;
                    } else if (gesture == Gesture.SWIPE_RIGHT) {
                        // do something on right (forward) swipe
                    	Log.d("Vplayer","forward swipe");
                   	 	VideoURL = "http://ether.remap.ucla.edu/glass/test/3.mp4";
                   		 prepVideo();
                        return true;
                    } else if (gesture == Gesture.SWIPE_LEFT) {
                        // do something on left (backwards) swipe
                    	Log.d("Vplayer","backward swipe");
                   	 	VideoURL = "http://ether.remap.ucla.edu/glass/test/4.mp4";
                   		 prepVideo();
                        return true;
                    }
                    return false;
                }
            });
            gestureDetector.setFingerListener(new GestureDetector.FingerListener() {
                @Override
                public void onFingerCountChanged(int previousCount, int currentCount) {
                  // do something on finger count changes
                	Log.d("Vplayer","numfinger change");
               	 	//VideoURL = "http://ether.remap.ucla.edu/glass/test/5.mp4";
               		//prepVideo();
                }
            });
            gestureDetector.setScrollListener(new GestureDetector.ScrollListener() {
                @Override
                public boolean onScroll(float displacement, float delta, float velocity) {
                	 // do something on scrolling
                	Log.d("Vplayer","scrolla");
					return false;
                   
                };
            });
            return gestureDetector;
        }
   
   /*
    * Send generic motion events to the gesture detector
    */
   @Override
   public boolean onGenericMotionEvent(MotionEvent event) {
       if (mGestureDetector != null) {
           return mGestureDetector.onMotionEvent(event);
       }
       return false;
   }
    
}
