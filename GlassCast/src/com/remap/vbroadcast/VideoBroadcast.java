package com.remap.vbroadcast;

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

public class VideoBroadcast extends Activity {
	
	private Camera mCamera;
	private MediaRecorder mMediaRecorder;
	private Socket socket;
	


	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		// hack to get around having to thread... 
		StrictMode.ThreadPolicy policy = new StrictMode.ThreadPolicy.Builder().permitAll().build();
		StrictMode.setThreadPolicy(policy); 
		// but ultimately it doesn't help the end result, 
		// so i will have to get all this out of main thread
		setContentView(R.layout.activity_video_broadcast);
		try {
			Log.d("Vplayer","making video recorder");
			makeVideoRecorder();
		} catch (UnknownHostException e) {
			Log.d("Vplayer","oops");
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (IOException e) {
			Log.d("Vplayer","oops2");
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.video_broadcast, menu);
		return true;
	}

	public boolean makeVideoRecorder() throws UnknownHostException, IOException{
		// this is your network socket
		socket = new Socket(InetAddress.getByName("128.97.152.47"),5000);
		ParcelFileDescriptor pfd = ParcelFileDescriptor.fromSocket(socket);
		mCamera = Camera.open(1);
		mMediaRecorder = new MediaRecorder();
		mMediaRecorder.setOutputFile(pfd.getFileDescriptor());
		mCamera.unlock();
		mMediaRecorder.prepare();
		mMediaRecorder.setCamera(mCamera);
		mMediaRecorder.setAudioSource(MediaRecorder.AudioSource.CAMCORDER);
		mMediaRecorder.setVideoSource(MediaRecorder.VideoSource.CAMERA);
		// this is the unofficially supported MPEG2TS format, suitable for streaming (Android 3.0+)
		mMediaRecorder.setOutputFormat(2); //H264
		mMediaRecorder.setAudioEncoder(MediaRecorder.AudioEncoder.DEFAULT);
		mMediaRecorder.setVideoEncoder(MediaRecorder.VideoEncoder.DEFAULT);
		//mMediaRecorder.setPreviewDisplay(mPreview.getHolder().getSurface());
		mMediaRecorder.start();
		Log.d("Vplayer","video broadcasting...");
		return true;
		
	}
	
}
