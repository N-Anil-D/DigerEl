<?php

$Link		=	"https://www.tcmb.gov.tr/kurlar/today.xml";
$Kurlar		=	simplexml_load_file($Link);

$USD_Birim			=	$Kurlar->Currency[0]->Unit;
$USD_Adi			=	$Kurlar->Currency[0]->Isim;
$USD_KisaAdi		=	$Kurlar->Currency[0]["CurrencyCode"];
$USD_Alis			=	$Kurlar->Currency[0]->ForexBuying;
$USD_Satis			=	$Kurlar->Currency[0]->ForexSelling;
$USD_EfektifAlis	=	$Kurlar->Currency[0]->BanknoteBuying;	
$USD_EfektifSatis	=	$Kurlar->Currency[0]->BanknoteSelling;	

$AUD_Birim			=	$Kurlar->Currency[1]->Unit;
$AUD_Adi			=	$Kurlar->Currency[1]->Isim;
$AUD_KisaAdi		=	$Kurlar->Currency[1]["CurrencyCode"];
$AUD_Alis			=	$Kurlar->Currency[1]->ForexBuying;
$AUD_Satis			=	$Kurlar->Currency[1]->ForexSelling;
$AUD_EfektifAlis	=	$Kurlar->Currency[1]->BanknoteBuying;	
$AUD_EfektifSatis	=	$Kurlar->Currency[1]->BanknoteSelling;	

$DKK_Birim			=	$Kurlar->Currency[2]->Unit;
$DKK_Adi			=	$Kurlar->Currency[2]->Isim;
$DKK_KisaAdi		=	$Kurlar->Currency[2]["CurrencyCode"];
$DKK_Alis			=	$Kurlar->Currency[2]->ForexBuying;
$DKK_Satis			=	$Kurlar->Currency[2]->ForexSelling;
$DKK_EfektifAlis	=	$Kurlar->Currency[2]->BanknoteBuying;	
$DKK_EfektifSatis	=	$Kurlar->Currency[2]->BanknoteSelling;	

$EUR_Birim			=	$Kurlar->Currency[3]->Unit;
$EUR_Adi			=	$Kurlar->Currency[3]->Isim;
$EUR_KisaAdi		=	$Kurlar->Currency[3]["CurrencyCode"];
$EUR_Alis			=	$Kurlar->Currency[3]->ForexBuying;
$EUR_Satis			=	$Kurlar->Currency[3]->ForexSelling;
$EUR_EfektifAlis	=	$Kurlar->Currency[3]->BanknoteBuying;	
$EUR_EfektifSatis	=	$Kurlar->Currency[3]->BanknoteSelling;	

$GBP_Birim			=	$Kurlar->Currency[4]->Unit;
$GBP_Adi			=	$Kurlar->Currency[4]->Isim;
$GBP_KisaAdi		=	$Kurlar->Currency[4]["CurrencyCode"];
$GBP_Alis			=	$Kurlar->Currency[4]->ForexBuying;
$GBP_Satis			=	$Kurlar->Currency[4]->ForexSelling;
$GBP_EfektifAlis	=	$Kurlar->Currency[4]->BanknoteBuying;	
$GBP_EfektifSatis	=	$Kurlar->Currency[4]->BanknoteSelling;	

$CHF_Birim			=	$Kurlar->Currency[5]->Unit;
$CHF_Adi			=	$Kurlar->Currency[5]->Isim;
$CHF_KisaAdi		=	$Kurlar->Currency[5]["CurrencyCode"];
$CHF_Alis			=	$Kurlar->Currency[5]->ForexBuying;
$CHF_Satis			=	$Kurlar->Currency[5]->ForexSelling;
$CHF_EfektifAlis	=	$Kurlar->Currency[5]->BanknoteBuying;	
$CHF_EfektifSatis	=	$Kurlar->Currency[5]->BanknoteSelling;	

$SEK_Birim			=	$Kurlar->Currency[6]->Unit;
$SEK_Adi			=	$Kurlar->Currency[6]->Isim;
$SEK_KisaAdi		=	$Kurlar->Currency[6]["CurrencyCode"];
$SEK_Alis			=	$Kurlar->Currency[6]->ForexBuying;
$SEK_Satis			=	$Kurlar->Currency[6]->ForexSelling;
$SEK_EfektifAlis	=	$Kurlar->Currency[6]->BanknoteBuying;	
$SEK_EfektifSatis	=	$Kurlar->Currency[6]->BanknoteSelling;	

$CAD_Birim			=	$Kurlar->Currency[7]->Unit;
$CAD_Adi			=	$Kurlar->Currency[7]->Isim;
$CAD_KisaAdi		=	$Kurlar->Currency[7]["CurrencyCode"];
$CAD_Alis			=	$Kurlar->Currency[7]->ForexBuying;
$CAD_Satis			=	$Kurlar->Currency[7]->ForexSelling;
$CAD_EfektifAlis	=	$Kurlar->Currency[7]->BanknoteBuying;	
$CAD_EfektifSatis	=	$Kurlar->Currency[7]->BanknoteSelling;	

$KWD_Birim			=	$Kurlar->Currency[8]->Unit;
$KWD_Adi			=	$Kurlar->Currency[8]->Isim;
$KWD_KisaAdi		=	$Kurlar->Currency[8]["CurrencyCode"];
$KWD_Alis			=	$Kurlar->Currency[8]->ForexBuying;
$KWD_Satis			=	$Kurlar->Currency[8]->ForexSelling;
$KWD_EfektifAlis	=	$Kurlar->Currency[8]->BanknoteBuying;	
$KWD_EfektifSatis	=	$Kurlar->Currency[8]->BanknoteSelling;	

$NOK_Birim			=	$Kurlar->Currency[9]->Unit;
$NOK_Adi			=	$Kurlar->Currency[9]->Isim;
$NOK_KisaAdi		=	$Kurlar->Currency[9]["CurrencyCode"];
$NOK_Alis			=	$Kurlar->Currency[9]->ForexBuying;
$NOK_Satis			=	$Kurlar->Currency[9]->ForexSelling;
$NOK_EfektifAlis	=	$Kurlar->Currency[9]->BanknoteBuying;	
$NOK_EfektifSatis	=	$Kurlar->Currency[9]->BanknoteSelling;	

$SAR_Birim			=	$Kurlar->Currency[10]->Unit;
$SAR_Adi			=	$Kurlar->Currency[10]->Isim;
$SAR_KisaAdi		=	$Kurlar->Currency[10]["CurrencyCode"];
$SAR_Alis			=	$Kurlar->Currency[10]->ForexBuying;
$SAR_Satis			=	$Kurlar->Currency[10]->ForexSelling;
$SAR_EfektifAlis	=	$Kurlar->Currency[10]->BanknoteBuying;	
$SAR_EfektifSatis	=	$Kurlar->Currency[10]->BanknoteSelling;	

$JPY_Birim			=	$Kurlar->Currency[11]->Unit;
$JPY_Adi			=	$Kurlar->Currency[11]->Isim;
$JPY_KisaAdi		=	$Kurlar->Currency[11]["CurrencyCode"];
$JPY_Alis			=	$Kurlar->Currency[11]->ForexBuying;
$JPY_Satis			=	$Kurlar->Currency[11]->ForexSelling;
$JPY_EfektifAlis	=	$Kurlar->Currency[11]->BanknoteBuying;	
$JPY_EfektifSatis	=	$Kurlar->Currency[11]->BanknoteSelling;	

$BGN_Birim			=	$Kurlar->Currency[12]->Unit;
$BGN_Adi			=	$Kurlar->Currency[12]->Isim;
$BGN_KisaAdi		=	$Kurlar->Currency[12]["CurrencyCode"];
$BGN_Alis			=	$Kurlar->Currency[12]->ForexBuying;
$BGN_Satis			=	$Kurlar->Currency[12]->ForexSelling;
$BGN_EfektifAlis	=	$Kurlar->Currency[12]->BanknoteBuying;	
$BGN_EfektifSatis	=	$Kurlar->Currency[12]->BanknoteSelling;	

$RON_Birim			=	$Kurlar->Currency[13]->Unit;
$RON_Adi			=	$Kurlar->Currency[13]->Isim;
$RON_KisaAdi		=	$Kurlar->Currency[13]["CurrencyCode"];
$RON_Alis			=	$Kurlar->Currency[13]->ForexBuying;
$RON_Satis			=	$Kurlar->Currency[13]->ForexSelling;
$RON_EfektifAlis	=	$Kurlar->Currency[13]->BanknoteBuying;	
$RON_EfektifSatis	=	$Kurlar->Currency[13]->BanknoteSelling;	

$RUB_Birim			=	$Kurlar->Currency[14]->Unit;
$RUB_Adi			=	$Kurlar->Currency[14]->Isim;
$RUB_KisaAdi		=	$Kurlar->Currency[14]["CurrencyCode"];
$RUB_Alis			=	$Kurlar->Currency[14]->ForexBuying;
$RUB_Satis			=	$Kurlar->Currency[14]->ForexSelling;
$RUB_EfektifAlis	=	$Kurlar->Currency[14]->BanknoteBuying;	
$RUB_EfektifSatis	=	$Kurlar->Currency[14]->BanknoteSelling;	

$IRR_Birim			=	$Kurlar->Currency[15]->Unit;
$IRR_Adi			=	$Kurlar->Currency[15]->Isim;
$IRR_KisaAdi		=	$Kurlar->Currency[15]["CurrencyCode"];
$IRR_Alis			=	$Kurlar->Currency[15]->ForexBuying;
$IRR_Satis			=	$Kurlar->Currency[15]->ForexSelling;
$IRR_EfektifAlis	=	$Kurlar->Currency[15]->BanknoteBuying;	
$IRR_EfektifSatis	=	$Kurlar->Currency[15]->BanknoteSelling;	

$CNY_Birim			=	$Kurlar->Currency[16]->Unit;
$CNY_Adi			=	$Kurlar->Currency[16]->Isim;
$CNY_KisaAdi		=	$Kurlar->Currency[16]["CurrencyCode"];
$CNY_Alis			=	$Kurlar->Currency[16]->ForexBuying;
$CNY_Satis			=	$Kurlar->Currency[16]->ForexSelling;
$CNY_EfektifAlis	=	$Kurlar->Currency[16]->BanknoteBuying;	
$CNY_EfektifSatis	=	$Kurlar->Currency[16]->BanknoteSelling;	

$PKR_Birim			=	$Kurlar->Currency[17]->Unit;
$PKR_Adi			=	$Kurlar->Currency[17]->Isim;
$PKR_KisaAdi		=	$Kurlar->Currency[17]["CurrencyCode"];
$PKR_Alis			=	$Kurlar->Currency[17]->ForexBuying;
$PKR_Satis			=	$Kurlar->Currency[17]->ForexSelling;
$PKR_EfektifAlis	=	$Kurlar->Currency[17]->BanknoteBuying;	
$PKR_EfektifSatis	=	$Kurlar->Currency[17]->BanknoteSelling;	

$QAR_Birim			=	$Kurlar->Currency[18]->Unit;
$QAR_Adi			=	$Kurlar->Currency[18]->Isim;
$QAR_KisaAdi		=	$Kurlar->Currency[18]["CurrencyCode"];
$QAR_Alis			=	$Kurlar->Currency[18]->ForexBuying;
$QAR_Satis			=	$Kurlar->Currency[18]->ForexSelling;
$QAR_EfektifAlis	=	$Kurlar->Currency[18]->BanknoteBuying;	
$QAR_EfektifSatis	=	$Kurlar->Currency[18]->BanknoteSelling;	
echo "<pre>";
print_r($Kurlar);
echo "</pre>";

?>