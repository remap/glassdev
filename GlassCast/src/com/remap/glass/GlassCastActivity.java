package com.remap.glass;

import java.io.IOException;
import java.net.InetAddress;
import java.net.Socket;
import java.net.UnknownHostException;

import android.hardware.Camera;
import android.media.MediaRecorder;
import android.os.Bundle;
import android.os.ParcelFileDescriptor;
import android.os.StrictMode;
import android.app.Activity;
import android.util.Log;
import android.view.Menu;

public class GlassCastActivity extends Activity {
	


	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		// hack to get around having to thread... 
		//StrictMode.ThreadPolicy policy = new StrictMode.ThreadPolicy.Builder().permitAll().build();
		//StrictMode.setThreadPolicy(policy); 
		// but ultimately it doesn't help the end result, 
		// so i will have to get all this out of main thread
		setContentView(R.layout.activity_glasscast);
		new VideoCast().execute(null,null,null);
	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.video_broadcast, menu);
		return true;
	}
}

