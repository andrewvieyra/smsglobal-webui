<html>
<head>
</head>
<title>SMSGlobal SMS Gateway</title>
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
<body onLoad="document.forms.msgForm.fromTxtBox.focus()">
<form method="post" id="msgForm" name="msgForm" action="send_sms.php">
<div style="background-color:#999;width:320px;height:480px">
<table >
	<tbody>
		<tr>
			<td style="font:Verdana, Geneva, sans-serif;font-size:14px;">From</td>
			<td >
		    	<input name="fromTxtBox" id="fromTxtBox" type="text" size="15">
        	</td>
		</tr>
		<tr>
			<td style="font:Verdana, Geneva, sans-serif;font-size:14px;">To</td>
			<td>
		    	<input name="toTxtBox" id="toTxtBox" type="text" size="15" >
        	</td>
		</tr>
		<tr>
			<td style="font:Verdana, Geneva, sans-serif;font-size:12px;">Message</td>
			<td>
				<textarea name="msgTxtArea" id="msgTxtArea" rows="15" cols="20"></textarea>
        	</td>
		</tr>
</tbody>
</table>
<table >
	<tbody>
    <tr>
    <td width="54" style="font:Verdana, Geneva, sans-serif;font-size:12px;">Month</td>
    <td width="61">
 	    <select name="deliveryMonthDrpDown" id="deliveryMonthDrpDown" style="width:45px">
        <option value="-1"></option>
        <option value="01">Jan</option>
        <option value="02">Feb</option>
        <option value="03">Mar</option>
        <option value="04">Apr</option>
        <option value="05">May</option>
        <option value="06">Jun</option>
        <option value="07">Jul</option>
        <option value="08">Aug</option>
        <option value="09">Sep</option>
        <option value="10">Oct</option>
        <option value="11">Nov</option>
        <option value="12">Dec</option>
      </select>
    </td>
    <td width="39" style="font:Verdana, Geneva, sans-serif;font-size:12px;">Day</td>
    <td width="66">
	  <select name="deliveryDayDrpDown" id="deliveryDayDrpDown">
        	<option value="-1"></option>
        	<option value="01">01</option>
        	<option value="02">02</option>
        	<option value="03">03</option>
        	<option value="04">04</option>
        	<option value="05">05</option>
        	<option value="06">06</option>
        	<option value="07">07</option>
        	<option value="08">08</option>
        	<option value="09">09</option>
        	<option value="10">10</option>
        	<option value="11">11</option>
        	<option value="12">12</option>
        	<option value="13">13</option>
        	<option value="14">14</option>
        	<option value="15">15</option>
        	<option value="16">16</option>
        	<option value="17">17</option>
        	<option value="18">18</option>
        	<option value="19">19</option>
        	<option value="20">20</option>
        	<option value="21">21</option>
        	<option value="22">22</option>
        	<option value="23">23</option>
        	<option value="24">24</option>
        	<option value="25">25</option>
        	<option value="26">26</option>
        	<option value="27">27</option>
        	<option value="28">28</option>
        	<option value="29">29</option>
        	<option value="30">30</option>
        	<option value="31">31</option>
      </select>
    </td>
    </tr>
    <tr>
    	<td style="font:Verdana, Geneva, sans-serif;font-size:12px;">Hours</td>
    	<td>
	<select name="deliveryHourDrpDown" id="deliveryHourDrpDown" style="width:50px">
        	<option value="-1" selected="selected"></option>
			<option value="00">00</option>
        	<option value="01">01</option>
        	<option value="02">02</option>
        	<option value="03">03</option>
        	<option value="04">04</option>
        	<option value="05">05</option>
        	<option value="06">06</option>
        	<option value="07">07</option>
        	<option value="08">08</option>
        	<option value="09">09</option>
        	<option value="10">10</option>
        	<option value="11">11</option>
        	<option value="12">12</option>
        	<option value="13">13</option>
        	<option value="14">14</option>
        	<option value="15">15</option>
        	<option value="16">16</option>
        	<option value="17">17</option>
        	<option value="18">18</option>
        	<option value="19">19</option>
        	<option value="20">20</option>
        	<option value="21">21</option>
        	<option value="22">22</option>
        	<option value="23">23</option>
        	<option value="24">24</option>
    </select>
        </td>
    	<td style="font:Verdana, Geneva, sans-serif;font-size:12px;">Mins</td>
    	<td>
    <select name="deliveryMinDrpDown" id="deliveryMiDrpDown">
        <option value="-1" selected="selected"></option>
		<option value="00">00</option>
        <option value="1">01</option>
        <option value="2">02</option>
        <option value="3">03</option>
        <option value="4">04</option>
        <option value="5">05</option>
        <option value="6">06</option>
        <option value="7">07</option>
        <option value="8">08</option>
        <option value="9">09</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
        <option value="24">24</option>
        <option value="25">25</option>
        <option value="26">26</option>
        <option value="27">27</option>
        <option value="28">28</option>
        <option value="29">29</option>
        <option value="30">30</option>
        <option value="31">31</option>
        <option value="32">32</option>
        <option value="33">33</option>
        <option value="34">34</option>
        <option value="35">35</option>
        <option value="36">36</option>
        <option value="37">37</option>
        <option value="38">38</option>
        <option value="39">39</option>
        <option value="40">40</option>
        <option value="41">41</option>
        <option value="42">42</option>
        <option value="43">43</option>
        <option value="44">44</option>
        <option value="45">45</option>
        <option value="46">46</option>
        <option value="47">47</option>
        <option value="48">48</option>
        <option value="49">49</option>
        <option value="50">50</option>
        <option value="51">51</option>
        <option value="52">52</option>
        <option value="53">53</option>
        <option value="54">54</option>
        <option value="55">55</option>
        <option value="56">56</option>
        <option value="57">57</option>
        <option value="58">58</option>
        <option value="59">59</option>
        <option value="60">60</option>
      </select>
        </td>
    </tr>
    </tbody>
</table>
<table >
	<tbody>
		<tr>
			<td width="77"></td>
			<td width="150" align="right">
				<input name="sendMsgBtn" id="sendMsgBtn" type="submit" value="Send">
			</td>
		</tr>
	</tbody>
</table>
</div>
<?php

?>
</form>
</body>
</html>
