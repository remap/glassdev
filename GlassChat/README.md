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


notes
=====

as of writing, the glass native apk is complete. 
image upload & client pushing works. 
interface could be cleaned up. 
access control should be added (i added, but glass can't support .htaccess... must think of other way.)