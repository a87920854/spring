<%
on error resume next
path = Session.Value("action_deleteimagesphoto_path")
if path <> "" then	
	path = server.mappath(path)
	if instr(path, "ueditor") <= 0 then
		response.write "«Dªk§R°£"
	  response.end
	end if
	
  Set Sys = Server.CreateObject( "Scripting.FileSystemObject" )
	If Sys.FileExists( path ) Then
		Sys.DeleteFile( path )
	End If
	Set Sys = Nothing

	
  Session.Value("action_deleteimagesphoto_path") = ""  
  response.write "ok"  
end if
%>