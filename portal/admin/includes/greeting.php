
<SCRIPT LANGUAGE="JavaScript">
currentTime=new Date();
//getHour() function will retrieve the hour from current time
if(currentTime.getHours()<12)
document.write("<b>Bom Dia </b>");
else if(currentTime.getHours()<17)
document.write("<b>Boa Tarde </b>");
else 
document.write("<b>Boa Noite </b>");
</SCRIPT>
