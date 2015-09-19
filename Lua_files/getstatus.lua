--  this files gets informaton the saves it to a file call info.lua.  info.lua is then read to conn:send
file.open("info.lua","w+")
w = file.writeline
w("<html>")
w("<body bgcolor='#E6E6E6'>")
w("<p>&nbsp;&nbsp;&nbsp;&nbsp;System Info <BR><BR> ")
w("IP: ")
w(wifi.sta.getip())
w("<BR>MAC: "..wifi.sta.getmac())
    majorVer, minorVer, devVer, chipid, flashid, flashsize, flashmode, flashspeed = node.info();
    w("<BR>NodeMCU: "..majorVer.."."..minorVer.."."..devVer.."<BR>Flashsize: "..flashsize.."<BR>ChipID: "..chipid)
    w("<BR>FlashID: "..flashid.."<BR>".."Flashmode: "..flashmode.."<BR>Heap: "..node.heap())
r,u,t=file.fsinfo() 
w("<p>&nbsp;&nbsp;&nbsp;&nbsp;File System <BR><BR>Total Memory : "..t.." <BR>bytes\r\nUsed  : "..u.." <BR>bytes\r\nRemain: "..r.." bytes\r\n")
r=nil u=nil t=nil
w("<BR><BR>")
w("&nbsp;&nbsp;&nbsp;&nbsp;Files in memory<br><BR>")
w("<table cellpadding ='2'>")
    l = file.list();
    for k,v in pairs(l) do
    w("<tr>")
       w("<td><B>"..k.."</td><td>"..v.." bytes</td>")
    w("</tr>")
    end
w("</table>")
w("<BR><BR>&nbsp;&nbsp;&nbsp;&nbsp;End of info")
w("</html>")
file.close()
