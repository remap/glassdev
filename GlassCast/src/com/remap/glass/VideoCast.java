package com.remap.glass;

import java.io.IOException;
import java.net.InetAddress;
import java.net.Socket;
import java.net.UnknownHostException;
import android.hardware.Camera;
import android.media.MediaRecorder;
import android.os.AsyncTask;
import android.os.ParcelFileDescriptor;
import android.util.Log;



public class VideoCast extends AsyncTask<Void, Void, Void> {

	@Override
	protected Void doInBackground(Void... params) {
		 Log.d("GlassCast","thread started");
			Socket socket = null;
			try {
				//128.97.152.51 
				socket = new Socket(InetAddress.getByAddress(new byte[] {(byte)128, 97, (byte)152, 51}),9999);
			} catch (UnknownHostException e1) {
				Log.d("Vplayer","socket fail...");
				e1.printStackTrace();
			} catch (IOException e1) {
				Log.d("Vplayer","socket super fail...");
				e1.printStackTrace();
			}
			ParcelFileDescriptor pfd = ParcelFileDescriptor.fromSocket(socket);
			Camera mCamera = Camera.open(1);
			MediaRecorder mMediaRecorder = new MediaRecorder();
			mMediaRecorder.setOutputFile(pfd.getFileDescriptor());
			mCamera.unlock();
			try {
				mMediaRecorder.prepare();
				Log.d("Vplayer","media player...");
			} catch (IllegalStateException e) {
				Log.d("Vplayer","media fail...");
				e.printStackTrace();
			} catch (IOException e) {
				Log.d("Vplayer","media super fail...");
				e.printStackTrace();
			}
			mMediaRecorder.setCamera(mCamera);
			mMediaRecorder.setAudioSource(MediaRecorder.AudioSource.CAMCORDER);
			mMediaRecorder.setVideoSource(MediaRecorder.VideoSource.CAMERA);
			mMediaRecorder.setOutputFormat(2); //H264
			mMediaRecorder.setAudioEncoder(MediaRecorder.AudioEncoder.DEFAULT);
			mMediaRecorder.setVideoEncoder(MediaRecorder.VideoEncoder.DEFAULT);
			//mMediaRecorder.setPreviewDisplay(mPreview.getHolder().getSurface());
			mMediaRecorder.start();
			Log.d("Vplayer","video broadcasting...");
			return null;
	}
	
	 protected void onPostExecute(Long result){
		 Log.d("GlassCast","thread done");
	 }
}





