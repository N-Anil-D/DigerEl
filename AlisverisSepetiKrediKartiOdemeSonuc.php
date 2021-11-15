<?php 
require_once("Ayarlar/ayar.php");
require_once("Ayarlar/fonksiyonlar.php");
require_once("Ayarlar/sitesayfalari.php");

    
    $oid			    =	$_POST['oid'];
    $SepetTaksitSorgusu = $DataBaseConnection->query("SELECT * FROM sepet WHERE SepetNumarasi = '$oid' LIMIT 1");
    $TaksitYaz          = $SepetTaksitSorgusu->fetch_assoc();
    $TaksitSecimi       = GeriDöndür($TaksitYaz["TaksitSecimi"]);
    if($TaksitSecimi==1){
        $TaksitSecimi   = "";
    }
    echo $TaksitSecimi."<br />";

    $hashparams		=	$_POST["HASHPARAMS"];
    $hashparamsval	=	$_POST["HASHPARAMSVAL"];
    $hashparam		=	$_POST["HASH"];
    $storekey		=	GeriDöndür($StoreKey);	// Sanal Pos Onaylandığında Bankanın Size Verdiği Sanal Pos Ekranına Girerek Oluşturulacak Olan İş Yeri Anahtarı
    $paramsval		=	"";
    $index1			=	0;
    $index2			=	0;
        while($index1<@strlen($hashparams)){
            $index2		=	@strpos($hashparams,":",$index1);
            $vl			=	$_POST[@substr($hashparams,$index1,$index2-$index1)];
                if($vl==null)
                $vl			=	"";
                $paramsval	=	$paramsval.$vl; 
                $index1		=	$index2+1;
        }
    $storekey		=	GeriDöndür($StoreKey);	// Sanal Pos Onaylandığında Bankanın Size Verdiği Sanal Pos Ekranına Girerek Oluşturulacak Olan İş Yeri Anahtarı
    $hashval		=	$paramsval.$storekey;
    $hash			=	@base64_encode(@pack('H*',@sha1($hashval)));
        if($paramsval!=$hashparamsval || $hashparam!=$hash) 	
        echo "<h4>Güvenlik Uyarısı! Sayısal İmza Geçerli Değil.</h4>";
    
    $name			=	GeriDöndür($ApiKullanicisi);	// Bankanın Size Verdiği Sanal Pos Ekranından Oluşturacağınız 3D Kullanıcı Adı
    $password		=	GeriDöndür($ApiSifresi);	// Bankanın Size Verdiği Sanal Pos Ekranından Oluşturacağınız 3D Kullanıcı Şifresi
    $clientid		=	$_POST["clientid"];
    $mode			=	"P";	// P Çekim İşlemi Demek, T Test İşlemi Demek (Kesinlikle P Olacak Yoksa Çekimler Kart Sahibine Geri Gider)
    $type			=	"Auth";	// Auth: Satış PreAuth: Ön Otorizasyon
    $expires		=	$_POST["Ecom_Payment_Card_ExpDate_Month"]."/".$_POST["Ecom_Payment_Card_ExpDate_Year"];
    $cv2			=	$_POST['cv2'];
    $tutar			=	$_POST["amount"];
    $taksit			=	$TaksitSecimi;	// Taksit Yapılacak İse Taksit Sayısı Girilmeli, 0 Kesinlikle Girilmeyecektir. Tek Çekim İçin Boş Bırakılacaktır, Taksit İşlemleri İçin Minimum 2 Girilir. Maksimum Bankanın Size Vereceği Taksit Sayısı Kadardır.
    $lip			=	GetHostByName($REMOTE_ADDR);
    $email			=	GeriDöndür($UyeEmail);	//	İsterseniz Çekimi Yapan Kullanıcınızın E-Mail Adresini Gönderebilirsiniz
    $mdStatus		=	$_POST['mdStatus'];
    $xid			=	$_POST['xid'];
    $eci			=	$_POST['eci'];
    $cavv			=	$_POST['cavv'];
    $md				=	$_POST['md'];

    if($mdStatus =="1" || $mdStatus == "2" || $mdStatus == "3" || $mdStatus == "4"){ 	
        $request	=	"DATA=<?xml version=\"1.0\" encoding=\"ISO-8859-9\"?>"."<CC5Request>"."<Name>{NAME}</Name>"."<Password>{PASSWORD}</Password>"."<ClientId>{CLIENTID}</ClientId>"."<IPAddress>{IP}</IPAddress>"."<Email>{EMAIL}</Email>"."<Mode>P</Mode>"."<OrderId>{OID}</OrderId>"."<GroupId></GroupId>"."<TransId></TransId>"."<UserId></UserId>"."<Type>{TYPE}</Type>"."<Number>{MD}</Number>"."<Expires></Expires>"."<Cvv2Val></Cvv2Val>"."<Total>{TUTAR}</Total>"."<Currency>949</Currency>"."<Taksit>{TAKSIT}</Taksit>"."<PayerTxnId>{XID}</PayerTxnId>"."<PayerSecurityLevel>{ECI}</PayerSecurityLevel>"."<PayerAuthenticationCode>{CAVV}</PayerAuthenticationCode>"."<CardholderPresentCode>13</CardholderPresentCode>"."<BillTo>"."<Name></Name>"."<Street1></Street1>"."<Street2></Street2>"."<Street3></Street3>"."<City></City>"."<StateProv></StateProv>"."<PostalCode></PostalCode>"."<Country></Country>"."<Company></Company>"."<TelVoice></TelVoice>"."</BillTo>"."<ShipTo>"."<Name></Name>"."<Street1></Street1>"."<Street2></Street2>"."<Street3></Street3>"."<City></City>"."<StateProv></StateProv>"."<PostalCode></PostalCode>"."<Country></Country>"."</ShipTo>"."<Extra></Extra>"."</CC5Request>";
        $request	=	@str_replace("{NAME}",$name,$request);
        $request	=	@str_replace("{PASSWORD}",$password,$request);
        $request	=	@str_replace("{CLIENTID}",$clientid,$request);
        $request	=	@str_replace("{IP}",$lip,$request);
        $request	=	@str_replace("{OID}",$oid,$request);
        $request	=	@str_replace("{TYPE}",$type,$request);
        $request	=	@str_replace("{XID}",$xid,$request);
        $request	=	@str_replace("{ECI}",$eci,$request);
        $request	=	@str_replace("{CAVV}",$cavv,$request);
        $request	=	@str_replace("{MD}",$md,$request);
        $request	=	@str_replace("{TUTAR}",$tutar,$request);
        $request	=	@str_replace("{TAKSIT}",$taksit,$request);

        $url		=	"https://<sunucu_adresi>/<apiserver_path>"; // Bu Adres Banka veya EST Firması Tarafından Verilir
        $ch			=	@curl_init();
        @curl_setopt($ch, CURLOPT_URL,$url);
        @curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,1);
        @curl_setopt($ch, CURLOPT_SSLVERSION, 3);
        @curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
        @curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        @curl_setopt($ch, CURLOPT_TIMEOUT, 90);
        @curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
        $result		=	@curl_exec($ch);
            if(@curl_errno($ch)){
               print @curl_error($ch);
            }else{
                @curl_close($ch);
            }
        $Response		=	"";
        $OrderId		=	"";
        $AuthCode		=	"";
        $ProcReturnCode	=	"";
        $ErrMsg			=	"";
        $HOSTMSG		=	"";
        $HostRefNum		=	"";
        $TransId		=	"";
        $response_tag	=	"Response";
        $posf			=	@strpos($result,("<".$response_tag.">"));
        $posl			=	@strpos($result,("</".$response_tag.">"));
        $posf			=	$posf+@strlen($response_tag)+2 ;
        $Response		=	@substr($result,$posf,$posl-$posf);
        $response_tag	=	"OrderId";
        $posf			=	@strpos($result,("<".$response_tag.">"));
        $posl			=	@strpos($result,("</".$response_tag.">")) ;
        $posf			=	$posf+@strlen($response_tag)+2;
        $OrderId		=	@substr($result,$posf,$posl-$posf);
        $response_tag	=	"AuthCode";
        $posf			=	@strpos($result,"<".$response_tag.">");
        $posl			=	@strpos($result,"</".$response_tag.">");
        $posf			=	$posf+@strlen($response_tag)+2 ;
        $AuthCode		=	@substr($result,$posf,$posl-$posf);
        $response_tag	=	"ProcReturnCode";
        $posf			=	@strpos($result,"<".$response_tag.">");
        $posl			=	@strpos($result,"</".$response_tag.">");
        $posf			=	$posf+@strlen($response_tag)+2 ;
        $ProcReturnCode	=	@substr($result,$posf,$posl-$posf);
        $response_tag	=	"ErrMsg";
        $posf			=	@strpos($result,"<".$response_tag.">");
        $posl			=	@strpos($result,"</".$response_tag.">");
        $posf			=	$posf+@strlen($response_tag)+2;
        $ErrMsg			=	@substr($result,$posf,$posl-$posf);
        $response_tag	=	"HostRefNum";
        $posf			=	@strpos($result,"<".$response_tag.">");
        $posl			=	@strpos($result,"</".$response_tag.">");
        $posf			=	$posf+@strlen($response_tag)+2;
        $HostRefNum		=	@substr($result,$posf,$posl-$posf);
        $response_tag	=	"TransId";
        $posf			=	@strpos($result,"<".$response_tag.">");
        $posl			=	@strpos($result,"</".$response_tag.">");
        $posf			=	$posf+@strlen($response_tag)+2;
        $$TransId		=	@substr($result,$posf,$posl-$posf);
            if($Response==="Approved"){
                
            $SepeteQ     = $DataBaseConnection->query("SELECT * FROM sepet WHERE SepetNumarasi = '$oid' ");
            $SepetVarMi  = $SepeteQ->num_rows;
                if($SepetVarMi>0){
                    $SepettekiToplamUrun = 0;
                    $SepettekiToplamFiyat = 0;
                    $KargoFiyatiHesapla = 0;
                    $EkleSil = 0;
                    while($SepetiYaz = $SepeteQ->fetch_assoc()){
                        $SepetID                            = GeriDöndür($SepetiYaz["id"]);
                        $SepeteKayitliUyeID                 = GeriDöndür($SepetiYaz["UyeID"]);
                        $SepettekiUrunSepetNumarasi         = GeriDöndür($SepetiYaz["SepetNumarasi"]);
                        $SepettekiUrunTabloAdi              = GeriDöndür($SepetiYaz["TabloAdi"]);
                        $SepettekiUrunUrunID                = GeriDöndür($SepetiYaz["UrunID"]);
                        $SepettekiUrunAdresID               = GeriDöndür($SepetiYaz["AdresID"]);
                        $SepettekiUrunAdedi                 = GeriDöndür($SepetiYaz["UrunAdedi"]);
                        $SepettekiUrunKargoFirmasiSecimiID  = GeriDöndür($SepetiYaz["KargoFirmasiSecimiID"]);
                        $SepettekiUrunVaryantSecimi         = GeriDöndür($SepetiYaz["VaryantSecimi"]);
                        $SepettekiUrunOdemeSecimi           = GeriDöndür($SepetiYaz["OdemeSecimi"]);
                        $SepettekiUrunTaksitSecimi          = GeriDöndür($SepetiYaz["TaksitSecimi"]);


                        $UruneBaglan  = $DataBaseConnection->query("SELECT * FROM $SepettekiUrunTabloAdi WHERE id = $SepettekiUrunUrunID LIMIT 1 ");
                        $UrunVarMi    = $UruneBaglan->num_rows;
                        $UrunTablosundakiUrunDegerleri = $UruneBaglan->fetch_assoc();
                        $UrunAdi             = $UrunTablosundakiUrunDegerleri["UrunAdi"];
                        $UrunFiyati          = GeriDöndür($UrunTablosundakiUrunDegerleri["UrunFiyati"]);
                        $UrunParaBirimi      = GeriDöndür($UrunTablosundakiUrunDegerleri["ParaBirimi"]);
                        $UrunKargoUcreti     = GeriDöndür($UrunTablosundakiUrunDegerleri["KargoUcreti"]);                            
                        $UrunVaryantBasligi  = GeriDöndür($UrunTablosundakiUrunDegerleri["VaryantBasligi"]);
                        $UrunResmi           = GeriDöndür($UrunTablosundakiUrunDegerleri["UrunResmiBIR"]);

                        $AdreslereBaglan    = $DataBaseConnection->query("SELECT * FROM  adresler WHERE id = $SepettekiUrunAdresID LIMIT 1 ");
                        $AdresVarMi         = $AdreslereBaglan->num_rows;
                        $AdresDegerleri     = $AdreslereBaglan->fetch_assoc();
                        $AdresAdiSoyadi     = GeriDöndür($AdresDegerleri["AdiSoyadi"]);
                        $Adresil            = GeriDöndür($AdresDegerleri["il"]);
                        $Adresilce          = GeriDöndür($AdresDegerleri["ilce"]);
                        $AdresTelefon       = GeriDöndür($AdresDegerleri["Telefon"]);
                        $Adres              = GeriDöndür($AdresDegerleri["Adres"]);
                        $TamAdres           = $Adresil . " / " . $Adresilce . " -- " . $Adres;
                        
                        if($UrunVaryantBasligi != ""){
                            $StokIcin_urunvaryantlari_Sorgusu   = $DataBaseConnection->query("SELECT * FROM urunvaryantlari WHERE id = '$SepettekiUrunVaryantSecimi' AND TabloAdi = '$SepettekiUrunTabloAdi' AND UrunID = $SepettekiUrunUrunID LIMIT 1");
                            $StokIcin_urunvaryantlari_Sayisi    = $StokIcin_urunvaryantlari_Sorgusu->num_rows;
                            if($StokIcin_urunvaryantlari_Sayisi>0){
                                $StokIcin_urunvaryantlari_fetch = $StokIcin_urunvaryantlari_Sorgusu->fetch_assoc();
                                $UrunStokSayisi   = GeriDöndür($StokIcin_urunvaryantlari_fetch["StokAdedi"]);//Urun varyantı tablosundaki ürün miktarı
                                $UrunVaryanAdi    = GeriDöndür($StokIcin_urunvaryantlari_fetch["VaryanAdi"]);
                                if($UrunStokSayisi == 0){
                                    $DataBaseConnection->query("DELETE FROM sepet WHERE SepetNumarasi= '$SepettekiUrunSepetNumarasi' AND UyeID = '$SepeteKayitliUyeID' AND TabloAdi = '$SepettekiUrunTabloAdi' AND UrunID = '$SepettekiUrunUrunID' LIMIT 1");
                                }elseif($SepettekiUrunAdedi>$UrunStokSayisi){
                                    $SepetUrunAdedi_VaryantStogundan_FazlaOlamaz  = $DataBaseConnection->query("UPDATE sepet SET UrunAdedi=$UrunStokSayisi WHERE SepetNumarasi= $SepettekiUrunSepetNumarasi AND UyeID = $SepeteKayitliUyeID AND TabloAdi = $SepettekiUrunTabloAdi AND UrunID = $SepettekiUrunUrunID LIMIT 1");
                                    $StokAdediGuncelle = $DataBaseConnection->query("UPDATE urunvaryantlari SET StokAdedi=StokAdedi-$UrunStokSayisi WHERE TabloAdi= '$SepettekiUrunTabloAdi' AND UrunID= '$SepettekiUrunUrunID' AND VaryanAdi='$UrunVaryanAdi' ");
                                }elseif($SepettekiUrunAdedi<=$UrunStokSayisi){
                                    // stoğu azalt --- stoğu azalt --- stoğu azalt --- stoğu azalt --- stoğu azalt --- stoğu azalt --- stoğu azalt --- stoğu azalt ---
                                    $StokAdediGuncelle = $DataBaseConnection->query("UPDATE urunvaryantlari SET StokAdedi=StokAdedi-$SepettekiUrunAdedi WHERE TabloAdi= '$SepettekiUrunTabloAdi' AND UrunID= '$SepettekiUrunUrunID' AND VaryanAdi='$UrunVaryanAdi' ");
                                    // stoğu azalt --- stoğu azalt --- stoğu azalt --- stoğu azalt --- stoğu azalt --- stoğu azalt --- stoğu azalt --- stoğu azalt ---
                                }
                            }
                        }else{
                            $StokIcin_UrunAdedi_Sorgusu   = $DataBaseConnection->query("SELECT * FROM $SepettekiUrunTabloAdi WHERE id = $SepettekiUrunUrunID LIMIT 1");
                            $StokIcin_UrunAdedi_Sayisi    = $StokIcin_UrunAdedi_Sorgusu->num_rows;
                            if($StokIcin_UrunAdedi_Sayisi>0){
                                $StokIcin_UrunAdedi_fetch = $StokIcin_UrunAdedi_Sorgusu->fetch_assoc();
                                $UrunStokSayisi   = GeriDöndür($StokIcin_UrunAdedi_fetch["UrunAdedi"]);//Urunün kendi tablosundaki ürün miktarı
                                if($SepettekiUrunAdedi>$UrunStokSayisi){
                                    $SepetUrunAdedi_VaryantStogundan_FazlaOlamaz  = $DataBaseConnection->query("UPDATE sepet SET UrunAdedi= $UrunStokSayisi WHERE SepetNumarasi= $SepettekiUrunSepetNumarasi AND UyeID = $SepeteKayitliUyeID AND TabloAdi = $SepettekiUrunTabloAdi AND UrunID = $SepettekiUrunUrunID LIMIT 1");
                                }
                            }

                        }
                        
                        $KargoTablosunaBaglan  = $DataBaseConnection->query("SELECT * FROM  kargofirmalari WHERE id = $SepettekiUrunKargoFirmasiSecimiID LIMIT 1 ");
                        $KargoFirmasiVarMi     = $KargoTablosunaBaglan->num_rows;
                        if($KargoFirmasiVarMi){
                            $KargoTablosuDegerleri = $KargoTablosunaBaglan->fetch_assoc();
                            $KargoFirmasiAdi       = GeriDöndür($KargoTablosuDegerleri["KargoFirmasiAdi"]);
                        }
                        
                        $SepettekiToplamUrun  += $SepettekiUrunAdedi;

                        // ------------------------------------------------------ KUR HESAPLA ------------------------------------------------------
                        
                        if($UrunParaBirimi=="USD"){
                            $UrunFiyatiHesapla = $UrunFiyati * $DolarKuru;
                        }elseif($UrunParaBirimi=="EUR"){
                            $UrunFiyatiHesapla = $UrunFiyati * $EuroKuru;
                        }else{
                            $UrunFiyatiHesapla = $UrunFiyati;
                        }
                        // ------------------------------------------------------ KUR HESAPLA ------------------------------------------------------
                        
                        // ----------------------------------------------------------------TOPLAM URUN FİYATI HESAPLA
                        $CokluUrunFiyatiHesapla = ($UrunFiyatiHesapla * $SepettekiUrunAdedi);

                        if($SepettekiUrunAdedi>1){
                            $SepettekiToplamFiyat += ($UrunFiyatiHesapla * $SepettekiUrunAdedi);
                        }else{
                            $SepettekiToplamFiyat += $UrunFiyatiHesapla; 
                        }
                        // ----------------------------------------------------------------TOPLAM URUN FİYATI HESAPLA

                        
// -------------------------------- SIPARİSLER KISMINA AKTAR  -------------------------------- SIPARİSLER KISMINA AKTAR -------------------------------- -------------------------------- SIPARİSLER KISMINA AKTAR -------------------------------- -------------------------------- SIPARİSLER KISMINA AKTAR --------------------------------

                        $SiparisEkle      = $DataBaseConnection->query("INSERT INTO siparisler 
                        (UyeID, SiparisNumarasi, TabloAdi, UrunID, UrunAdi, UrunAdedi, UrunFiyati, ParaBirimi, ToplamUrunFiyati, KargoUcreti, KargoFirmasiSecimi, UrunResmiBIR, VaryantBasligi, VaryantSecimi, AdresAdiSoyadi, AdresDetay, AdresTelefon, OdemeSecimi, TaksitSecimi, SiparisTarihi, SiparisIPadresi) 
                        values ('$SepeteKayitliUyeID', '$SepettekiUrunSepetNumarasi', '$SepettekiUrunTabloAdi', '$SepettekiUrunUrunID', '$UrunAdi', '$SepettekiUrunAdedi', '$UrunFiyati', '$UrunParaBirimi', '$CokluUrunFiyatiHesapla', '$UrunKargoUcreti', '$SepettekiUrunKargoFirmasiSecimiID', '$UrunResmi', '$UrunVaryantBasligi', '$SepettekiUrunVaryantSecimi', '$AdresAdiSoyadi', '$TamAdres', '$AdresTelefon', 'KREDI KARTI', '$TaksitSecimi', '$zaman', '$IPAdresi')");
                        if($SiparisEkle){
                            $SepetiTemizle  = $DataBaseConnection->query("DELETE FROM sepet WHERE id = '$SepetID' AND UyeID = '$Uyeid' LIMIT 1 ");
                            if($SepetiTemizle){
                                $UrunAdediGuncelle = $DataBaseConnection->query("UPDATE $SepettekiUrunTabloAdi SET UrunAdedi=UrunAdedi-$SepettekiUrunAdedi, ToplamSatisSayisi=ToplamSatisSayisi+$SepettekiUrunAdedi WHERE id='$SepettekiUrunUrunID' LIMIT 1");
                            }
                        }
// -------------------------------- SIPARİSLER KISMINA AKTAR  -------------------------------- SIPARİSLER KISMINA AKTAR -------------------------------- -------------------------------- SIPARİSLER KISMINA AKTAR -------------------------------- -------------------------------- SIPARİSLER KISMINA AKTAR --------------------------------
                        

                        
                    }//while kapatması
                    $UcretiKontrolEt   = $DataBaseConnection->query("SELECT SUM(ToplamUrunFiyati) AS ToplamFiyatURUNLER FROM siparisler WHERE UyeID = '$SepeteKayitliUyeID' AND SiparisNumarasi = '$SepettekiUrunSepetNumarasi' ");
                    $FiyatlaraBak      = $UcretiKontrolEt->num_rows;
                    if($FiyatlaraBak){
                        $KargoFiyat         = $UcretiKontrolEt->fetch_assoc();
                        $ToplamFiyat        = $KargoFiyat["ToplamFiyatURUNLER"];
                        if($ToplamFiyat>100){
                            $KargoFiyatlariniSifirla = $DataBaseConnection->query("UPDATE siparisler SET KargoUcreti = 0 WHERE UyeID = '$SepeteKayitliUyeID' AND SiparisNumarasi = '$SepettekiUrunSepetNumarasi' ");
                        }
                    }

                }     
                

                
                echo "Ödeme isleminiz basariyla gerçeklestirildi.";	// İster Direk Sayfayı Yönlendiririz, İstersek de Burda İşlem Yapabiliriz.
            }else{
                echo "Ödeme isleminiz sırasında hata oluştu. Hata = ".$ErrMsg;
            }
    }else{
        echo "Kredi Kartı Bankası 3D Onayı Vermedi, Lütfen Bilgileriniz Kontrol Edip Tekrar Deneyiniz. Sorununuz Devam Eder İse Lütfen Kartınızın Sahibi Olan Bankanın Müşteri Temsilcileriyle İletişime Geçiniz.";
    }
    
    
$DataBaseConnection->close();
ob_end_flush();


?>