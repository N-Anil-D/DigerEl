$(document).ready(function(){
    
    $.SoruIcerigiGoster = function(ElemanIDsi){
        var SoruIDsi = ElemanIDsi;
        var IslenecekAlan = "#" + ElemanIDsi;

        $(".SSScevapAlani").slideUp();
        $(IslenecekAlan).parent().find(".SSScevapAlani").slideToggle();
    
    };
    
    $.UrunDetayResmiDegistir = function(ResimSql){
        
        $("#BuyukResim").attr("src", ResimSql);
    };
    
    $.FavoriyeEkleyemzsin = function(X){ //Burada favoriye ekleyememe uyarısı verdirttim UrunDetay.php / Satır 103
        
        alert(X);
    }

    $.KrediKartiSecildi = function(){
        $(".KrediKartiAlani").css("display","block");
        $(".BankaHavaleAlani").css("display","none");
    }
    
    $.BankaHavalesiSecildi = function(){
        $(".KrediKartiAlani").css("display","none");
        $(".BankaHavaleAlani").css("display","block");
    }
    
    
    
    

    $.Var0 = function(){
        $(".Var2").css("display","none");
        $(".Var3").css("display","none");
        $(".Var4").css("display","none");
        $(".Var5").css("display","none");
    }
    
    $.Var2 = function(){
        $(".Var2").css("display","block");
        $(".Var3").css("display","none");
        $(".Var4").css("display","none");
        $(".Var5").css("display","none");
    }
    $.Var3 = function(){
        $(".Var2").css("display","block");
        $(".Var3").css("display","block");
        $(".Var4").css("display","none");
        $(".Var5").css("display","none");
    }
    
    $.Var4 = function(){
        $(".Var2").css("display","block");
        $(".Var3").css("display","block");
        $(".Var4").css("display","block");
        $(".Var5").css("display","none");
    }
    
    $.Var5 = function(){
        $(".Var2").css("display","block");
        $(".Var3").css("display","block");
        $(".Var4").css("display","block");
        $(".Var5").css("display","block");
    }

});