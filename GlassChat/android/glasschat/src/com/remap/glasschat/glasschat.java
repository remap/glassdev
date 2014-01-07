package com.remap.glasschat;
import android.provider.Settings.Secure;

import android.app.Activity;
import android.os.Bundle;
import android.webkit.WebView;

/**
 * @author Alex Nano
 */
public class glasschat extends Activity {
    /**
     * Called when the activity is first created.
     */
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.main);
        String android_id = Secure.getString(this.getContentResolver(),Secure.ANDROID_ID); 
        WebView engine = (WebView) findViewById(R.id.web_engine);
        engine.loadUrl("http://ether.remap.ucla.edu/glass/index.html?uid="+android_id);
        engine.getSettings().setJavaScriptEnabled(true);

        //String data = "<html>" + 
        //"<meta name='viewport content=width=device-width, initial-scale=1.02' />" +
         //       "<body><h1>Yay, Glass Chat+!</h1></body>" +
           //     "</html>";

        //engine.loadData(android_id, "text/html", "UTF-8");
    }
}
