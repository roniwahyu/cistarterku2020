<?php 
/*
EVAPOTRANSPIRASI LIBRARY - PENMAHN MONTEIT UNTUK IRIGASI INDONESIA
Related to FAO CROPWAT 8 Formula

CREATED BY : Syahroni Wahyu Iriananda <roniwahyu@gmail.com>, Dec 2019

Inspired by Excel ET0 Formula by Lutfi

D5 : Latitude
D8 : Day Number
D35 :Inverse Relative Distance Earth-Sun
D36 : Solar Declination
D37 : Sunset Hour Angle
D38 : Extraterrestrial Radiation
D12 : Min Temp
D13 : Max Temp
D16 : Dew POint



*/
if(!function_exists('inv_relative')){
	function inv_relative($daynumber){
		//function deliver to FAO CROPWAT Eq23 Inverse Relative Distance Earth-Sun
		//=IF(OR(D8<1,D8>366),"nd",1+0.033*COS(2*PI()*D8/365))
		// D8 = DayNumber
		
		if(!empty($daynumber)){
			if($daynumber<1 || $daynumber >366){
				$result=FALSE;
			}else{
				$result=1+0.033*Cos(2*PI()*$daynumber/365);
			}
		}

		return $result;
	}
}
if(!function_exists('solar_decline')){
	function solar_decline($daynumber){
		//function deliver to FAO CROPWAT Eq24 Solar Declination
		// =IF(OR(D8<1,D8>366),"nd",0.409*SIN(2*PI()*D8/365-1.39))
		if(!empty($daynumber)){
			if($daynumber<1 || $daynumber >366){
				$result=FALSE;
			}else{
				$result=0.409*Sin(2*PI()*$daynumber/365-1.39);
			}
		}
		return $result;
	}}


if(!function_exists('sun_hour')){
	function sun_hour($daynumber,$latitude){
		// Function deliver to FAO CROPWAT --> Sunset Hour Angle
		// =IF(OR(D8<1,D8>366,D5="",ABS(D5)>90),"nd",ACOS(-TAN(D5*PI()/180)*TAN(D36)))
		if(!empty($daynumber) && !empty($latitude)){
			if($daynumber<1 || $daynumber >366 || abs($latitude>90)){
				$result=FALSE;
			}else{
				$result=acos(-tan($latitude*PI()/180)*tan(solar_decline($daynumber)));
			}
		}
		
		return $result;
	}
}
if(!function_exists('et_rad')){
	function et_rad($data){
		// Function deliver to FAO CROPWAT --> Extraterrestrial Radiation
		// =IF(OR(D35="nd",D36="nd",D37="nd"),"nd",
			// (24*60*0.082/PI())*
			// D35*
			// (D37*SIN(D5*PI()/180)*
			// SIN(D36)+COS(D5*PI()/180)*COS(D36)*SIN(D37)))
		// (24*60*0.082/PI())*
		// D35*
			// (D37*SIN(D5*PI()/180)*SIN(D36)+COS(D5*PI()/180)*COS(D36)*SIN(D37))
		/*
			$data=array(
				'day'=>$daynumber,
				'lat'=>$latitude,
				'inv'=>$inverse_relative, //D35
				'dec'=>$solar_declination, //D36
				'sun'=>$sun_hour, //D37
			)
		*/
		if(!empty($data)){
			if($data['inv']==FALSE || $data['dec']==FALSE || $data['sun']==FALSE){
				$result=FALSE;
			}else{
				$a=(24*60*0.082/PI());
				$b=$data['inv'];
				$c=($data['sun'])*(sin($data['day']*PI()/180))*(sin($data['dec'])+cos($data['day']*PI()/180))*(cos($data['dec']))*(sin($data['sun']));
				// print_r($a." ".$b." ".($c1*$c2*$c3*$c4));	
				$result=$a*$b*$c;

			}
		}
		return $result;
	}
}

if(!function_exists('sat_vapor_min')){
	function sat_vapor_min($temp_min){
		// Function deliver to FAO CROPWAT --> Saturation Vapour Pressure at Tmin
		// =0.6108*EXP(17.27*D12/(237.3+D12))
		if(!empty($temp_min)||$temp_min!=null){

			$result=0.6108*EXP(17.27*$temp_min/(237.3+$temp_min));
		}else{
			$result=FALSE;
		}
		return $result;
	}
}
if(!function_exists('sat_vapor_max')){
	function sat_vapor_max($temp_max){
		// Function deliver to FAO CROPWAT --> Saturation Vapour Pressure at Tmax
		// =0.6108*EXP(17.27*D13/(237.3+D13))
		if(!empty($temp_max)||$temp_max!=null){

			$result=0.6108*EXP(17.27*$temp_max/(237.3+$temp_max));
		}else{
			$result=FALSE;
		}
		return $result;
		
	}
}
if(!function_exists('sat_vapor_avg')){
	function sat_vapor_avg($temp_min,$temp_max){
		// Function deliver to FAO CROPWAT --> Saturation Vapour Pressure
		// =IF(D12>=D13,"nd",AVERAGE(D41:D42))
		if((!empty($temp_max)||$temp_max!=null)&&(!empty($temp_min)||$temp_min!=null)){

			$result=(($temp_min+$temp_max)/2);
		}else{
			$result=FALSE;
		}
	
		return $result;
	}
}
if(!function_exists('act_vapor1')){
	function act_vapor1($dew){
		// Function deliver to FAO CROPWAT --> Actual Vapour Pressure 1
		// =IF(D16="","nd",0.6108*EXP(17.27*D16/(237.3+D16)))
		if(!empty($dew)||$dew!=null){

			$result=0.6108*EXP(17.27*$dew/(237.3+$dew));
		}else{
			$result=FALSE;
		}
	
		return $result;
	}
}
if(!function_exists('act_vapor2')){
	function act_vapor2($min,$max){
		// Function deliver to FAO CROPWAT --> Actual Vapour Pressure 2
		// =IF(OR(D18>=D19,D18<1,D19>100),"nd",0.005*(D41*D19+D42*D18))
		return $result;
	}
}
if(!function_exists('act_vapor3')){
	function act_vapor3(){
		// Function deliver to FAO CROPWAT --> Actual Vapour Pressure 3
		// =IF(AND(D21>0,D21<=100),D21*0.6108*EXP(17.27*0.5*(D12+D13)/(237.3+0.5*(D12+D13)))/100,"nd")
		return $result;
	}
}
if(!function_exists('dew_point')){
	function dew_point(){
		// Function deliver to FAO CROPWAT --> Approximated Dew Point Temperature
		// =IF(OR(D12>=D13,D12=""),"nd",0.52*D12+0.6*D13-0.009*D13*D13-2)
		return $result;
	}
}
if(!function_exists('act_vapor4')){
	function act_vapor4(){
		// Function deliver to FAO CROPWAT --> Actual Vapour Pressure 4
		// =IF(OR(D47="nd",D18<>"",D19<>""),"nd",0.6108*EXP(17.27*D47/(237.3+D47)))
		return $result;
	}
}
if(!function_exists('act_vapor')){
	function act_vapor(){
		// Function deliver to FAO CROPWAT --> Actual Vapour Pressure
		return $result;
	}
}
if(!function_exists('sat_vapor_def')){
	function sat_vapor_def(){
		// Function deliver to FAO CROPWAT --> Saturation Vapour Pressure Deficit
		// =IF(OR(D49="nd",D43="nd"),"nd",D43-D49)
		return $result;
	}
}
if(!function_exists('slope_vapor')){
	function slope_vapor(){
		// Function deliver to FAO CROPWAT --> Slope of the Vapour pressure curve
		return $result;
	}
}
if(!function_exists('psychrometric')){
	function psychrometric(){
		// Function deliver to FAO CROPWAT --> Psychrometric Constant
		return $result;
	}
}



if(!function_exists('daylength')){
	function daylength(){
		// Day Length	Eq.34	Hours
		return $result;
	}
}
if(!function_exists('solar_rad1')){
	function solar_rad1(){
		// Solar Radiation 1	Eq.35	MJ/m²day
		return $result;
	}
}
if(!function_exists('solar_rad2')){
	function solar_rad2(){
		// Solar Radiation 2		MJ/m²day
		return $result;
	}
}
if(!function_exists('solar_rad3')){
	function solar_rad3(){
		// Solar Radiation 3		MJ/m²day
		return $result;
	}
}
if(!function_exists('solar_rad')){
	function solar_rad(){
		// Solar Radiation		MJ/m²day
		return $result;
	}
}
if(!function_exists('solar_rad_clear_sky')){
	function solar_rad_clear_sky(){
		// Clear-sky Solar Radiation	Eq.37	MJ/m²day
		return $result;
	}
}
if(!function_exists('net_shortwave_rad')){
	function net_shortwave_rad(){
		// Net Shortwave Radiation	Eq.38	MJ/m²day
		return $result;
	}
}
if(!function_exists('net_longwave_rad')){
	function net_longwave_rad(){
		// Net Longwave Radiation	Eq.39	MJ/m²day
		return $result;
	}
}
if(!function_exists('net_rad')){
	function net_rad(){
		// Net Radiation	Eq.40	MJ/m²day
		return $result;
	}
}

if(!function_exists('wind_height')){
	function wind_height(){
		// Height of Measurement		
		return $result;
	}
}
if(!function_exists('wind_speed')){
	function wind_speed(){
		// Wind Speed at 2 m	Eq.47	m/s
		return $result;
	}
}

if(!function_exists('ref_et')){
	function ref_et(){
		// REFERENCE ET	Eq.6	mm/day
		return $result;
	}
}


/*
-----
Determination of ETo with missing data		
Tmean		°C
delta (𝜟)	Eq.13	kPa/°C
gamma ( 𝝲 )	Eq.8	kPa/°C
(1 + 0.34 u2) =		
Δ/[Δ+γ(1+0.34u2)] =		
γ/[Δ+γ(1+0.34u2)] =		
900/(Tmean+273) u2 =		
		
Estimation of humidity data:		
Tdew	assume = Tmin	°C
ea	Eq.14	kPa
e°(Tmax) =	Eq. 11	kPa
e°(Tmin) =	Eq. 11	kPa
es =		kPa
es-ea		kPa
RHmax = 100 ea/e°(Tmin) =		%
RHmin = 100 ea/e°(Tmax) =		%
RHmean = (RHmax + RHmin)/2 =		%
		
Estimation of radiation data:		
Rs = 0.16 √(26.6-14.8) Ra	Eq. 50	Ra
Ra	Eq. 21	MJ/m²day
Rs = 0.44 Ra		MJ/m²day
Rso		MJ/m²day
Rs/Rso		
Rns		MJ/m²day
		
Tmax, K		K
𝛔Tmax, K^4	Table 2.8	MJ/m²day
		
Tmin, K		K
𝛔Tmax, K^4	Table 2.8	MJ/m²day
(σTmax,K4 + σTmin,K4)/2		MJ/m²day
		
(0.34-0.14√ea) =		kPa
		
(1.35 Rs/Rso - 0.35) =		
Rnl		MJ/m²day
Rn		MJ/m²day
		
G		assume
(Rn - G) =		MJ/m²day
0.408 (Rn - G) =		mm/day
		
Grass reference evapotranspiration:		
0.408 (Rn-G) Δ/[Δ+γ(1+0.34u2)] =		mm/day
900/(T+273) u2 (es-ea) γ/[Δ+γ(1+0.34u2)] =		mm/day
ETo =		mm/day


----*/

 ?>