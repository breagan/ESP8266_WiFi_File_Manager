pl = nil;
-- create a server  
sv=net.createServer(net.TCP, 10) 
    -- server listen on 80
    sv:listen(80,function(conn)
		conn:on("receive", function(conn, pl) 
		payload = pl;
		conn:send("<html />")
		conn:send("<body bgcolor='#E6E6E6'>")
		conn:send("<B/>ESP8266 chipID: "..node.chipid())
		conn:send("<br/>Running....!")
		print(pl.."\n")
-------------    Required for wifitools  -------------------------          
		  if string.sub(pl, 0, 11) == "**command**"  then
            dofile("wifi_tools.lua")
          end 
--------------------- end  ---------------------------------------
		  
 --  this if statment can be removed if Status is not desirable         
         if string.find(pl, "status") then
			dofile("getstatus.lua")
			tmr.delay(250)
			file.open("info.lua", "r")
			conn:send("\n")
			conn:send(file.read())
			file.close("info.lua")
         end
---------------------------------------------------------------------          
		conn:close()
		collectgarbage()
		end)
      
	end)
print("Server running...")
