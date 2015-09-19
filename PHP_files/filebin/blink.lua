-----   Blink   ------
pin= 7  -- GPIO13
gpio.mode(pin, gpio.OUTPUT)         -- sets GPIO13 
print("Blink running...")      		-- debug
tmr.alarm(1, 500, 1, function()     -- script loops every half second 500ms
	-- print(gpio.read(pin))
	if gpio.read(pin) == 1 then
		gpio.write(pin, gpio.LOW)
		print("off")
	else
		gpio.write(pin, gpio.HIGH)
		print("on")	
	end
end )
collectgarbage()
