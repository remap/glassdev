glasschat
=======

the goal is a simple drag & drop 'distrbuted teleprompter' / simstim type app for google glass. 


client
======

install android apk on glass

you can also 'fake' a glass device by loading url:

http://ether.remap.ucla.edu/glass/index.html?uid=whatever1234

replace UID with anything, open as many windows as you like. 


server
======

open http://ether.remap.ucla.edu/glass/control.html in a browser

enter text, select device, hit 'send'. 

also, upload image, copy text into 'text', then hit 'send'. 

optionally, hit 'refresh' to preview. 

also note

open http://ether.remap.ucla.edu/glass/control2.html - developed to make it easier to feed lines from a script in a timely manner. 

copy in any text, select & hit spacebar to send the text to the slected 


notes
=====

as of writing, the glass native apk is complete. 
image upload & client pushing works. 
video won't work (yet) until html5 video works... thus we have a separate glass video player app. 
access control should be added (i added, but glass can't support .htaccess... must think of other way.)

it seems some people have indeed gotten html5 video to work, after extensive hacking. must give this another shot in future. 
http://stackoverflow.com/questions/3815090/webview-and-html5-video