Remap Glass Devlopment
========

Google Glass development apps are here. 

Once an app is working well enough, it may be put in a separate individual public repository.

Below are descriptions of all projects, with status. As major status changes, please update this file. 



glassChat
========

realtime glass teleprompter.

status: works well. 

Update:

now records video.

1) after launch, tap side once to start preview / camera roll. 

2) when ready, tap again to start recording. you will see preview moving. 

3) when done with take, swipe forward to stop recording. you will see notification that it stopped, and the preview will pause. 

4) to start next take, tap again, it will record / preview will be moving. 

5) to stop, swipe forward. 


to get video off device, plug into computer w/ android SDK on it and type:

adb pull /sdcard/movies/GlassChat

when you pull, you will want to wipe files for storage

adb shell rm /sdcard/movies/GlassChat/*.mp4



glassView
========

realtime video player (from server)

status: works well - yet, need to refine transcoding (video file creation) at native glass resolution. 


glassCast
========

realtime video broadcast from glass

status: not working



glassPlace
========

location-based media trigger

status: functional, needs testing


glassBurst
========

continuous photography

status: not working / crashes. 


glassMirror
========

first REMAP prototype, essentially google's Mirror API example with a hook for video insertion. 

status: functional 


glassEffect
========

realtime video effects on glass

status: semi-functional (video effect works, but unintended artifacts exist)


glassSense
========

the goal is to expose all sensors in glass, so they can be easily used in other projects if needed. 

status: semi-functional 

individual sensor examples work, but need to be both expanded to rest of sensors, and compiled into single application. 


