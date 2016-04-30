# ESP8266_WiFi_File_Manager
These files allow ESP8266 remote file management and control over WiFi

With these files it is possible to add, delete, compile, and run files on the ESP via a web browser.


Files in the Lua_files folder (4) should be uploaded to a freshly formated ESP8266 running NodeMCU.
init.lua should be edited to reflect your LAN SSID and Password settings.

PHP files should be uploaded to a web server on the common LAN with the ESP.

## Using docker

If you don't have any webserver with PHP available, you can use the docker image _gaetancollaud/esp8266_wifi_manager_

`docker run -d -p 80:80 gaetancollaud/esp8266_wifi_manager`
