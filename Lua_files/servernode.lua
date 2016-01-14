pl = nil;
     -- create a server  
sv=net.createServer(net.TCP, 10) 
    -- server listen on 80
    sv:listen(80,function(conn)
		conn:on("receive", function(conn, pl) 
		payload = pl;
		print(pl.."\n")
------------------------------------------------------------------------        
		if string.sub(pl, 0, 11) == "**command**"  then
             dofile("wifi_tools.lua")
        end 
-------------------------------------------------------------------------         
			dofile("getstatus.lua")
			tmr.delay(250)
			file.open("info.lua", "r")
			conn:send(file.read())
			file.close("info.lua")
		conn:close()
		collectgarbage()
		end)
end)
print("Server running...")
