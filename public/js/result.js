function initMap() {

    const elements = document.getElementsByClassName('js-getVariable');
    var addresses = [];
    
    for(const address of elements){
      addresses.push(address.dataset.region)
    }

    var latlng = []; //緯度経度の値をセット
    var marker = []; //マーカーの位置情報をセット
    var myLatLng; //地図の中心点をセット用
    var geocoder;
    geocoder = new google.maps.Geocoder();

    var map = new google.maps.Map(document.getElementById('map'), {mapTypeId: google.maps.MapTypeId.HYBRID});//地図を作成する

    geo(aftergeo);

    function geo(callback){
        var cRef = addresses.length;
        for (var i = 0; i < addresses.length; i++) {
            (function (i) { 
                geocoder.geocode({'address': addresses[i]}, 
                    function(results, status) { // 結果
                        if (status === google.maps.GeocoderStatus.OK) { // ステータスがOKの場合
                            latlng[i]=results[0].geometry.location;// マーカーを立てる位置をセット
                            marker[i] = new google.maps.Marker({
                                position: results[0].geometry.location, // マーカーを立てる位置を指定
                                map: map // マーカーを立てる地図を指定
                            });
                        } else { // 失敗した場合
                        }//if文の終了。ifは文なので;はいらない
                        if (--cRef <= 0) {
                            callback();//全て取得できたらaftergeo実行
                        }
                    }//function(results, status)の終了
                );//geocoder.geocodeの終了
            }) (i);
        }//for文の終了
    }//function geo終了

    function aftergeo(){
        myLatLng = latlng[0];//最初の住所を地図の中心点に設定
        var opt = {
            center: myLatLng, // 地図の中心を指定
            zoom: 18 // 地図のズームを指定
        };//地図作成のオプションのうちcenterとzoomは必須
        map.setOptions(opt);//オプションをmapにセット
    }//function aftergeo終了

};//function initMap終了

// function initMap() {
//     // welcome.blade.phpで描画領域を設定するときに、id=mapとしたため、その領域を取得し、mapに格納します。
//     const target = document.getElementById("map");
    
//     const addresses = document.getElementsByClassName('js-getVariable');
//     console.log(addresses[0].dataset.region);
//     var geocoder = new google.maps.Geocoder();
    
//     var markerData = [];
    
//     for(const address of addresses){
//         geocoder.geocode({ address: address.dataset.region }, function(results, status){
//         if (status === 'OK' && results[0]){
    
//           console.log(results[0].geometry.location);
//           // var marker = new google.maps.Marker({
//           //   position: results[0].geometry.location,
//           //   map: map,
//           //   animation: google.maps.Animation.DROP
//           // });
    
//         }else{ 
//           //住所が存在しない場合の処理
//           alert('住所が正しくないか存在しません。');
//         }
//       });
//     }
    
//     var map = new google.maps.Map(target, {  
//       center: results[0].geometry.location,
//       mapTypeId: google.maps.MapTypeId.HYBRID,
//       zoom: 18
//     });
//       // geocoder.geocode({ address: address.dataset.region }, function(results, status){
//       //   if (status === 'OK' && results[0]){
    
//       //     console.log(results[0].geometry.location);
    
//       //     var map = new google.maps.Map(target, {  
//       //       center: results[0].geometry.location,
//       //       mapTypeId: google.maps.MapTypeId.HYBRID,
//       //       zoom: 18
//       //     });
    
//       //     var marker = new google.maps.Marker({
//       //       position: results[0].geometry.location,
//       //       map: map,
//       //       animation: google.maps.Animation.DROP
//       //     });
    
//       //   }else{ 
//       //     //住所が存在しない場合の処理
//       //     alert('住所が正しくないか存在しません。');
//       //   }
//       // });
//     // // 東京タワーの緯度は35.6585769,経度は139.7454506と事前に調べておいた
//     // let tokyoTower = {lat: 35.6585769, lng: 139.7454506};
//     // // オプションを設定
//     // const opt = {
//     //     zoom: 13, //地図の縮尺を指定
//     //     center: tokyoTower, //センターを東京タワーに指定
//     // };
//     // // 地図のインスタンスを作成します。第一引数にはマップを描画する領域、第二引数にはオプションを指定
//     // let mapObj = new google.maps.Map(map, opt);
    
//     // let marker = new google.maps.Marker({
//     //     // ピンを差す位置を決めます。
//     //     position: tokyoTower,
//     // // ピンを差すマップを決めます。
//     //     map: mapObj,
//     // // ホバーしたときに「tokyotower」と表示されるようにします。
//     //     title: 'tokyotower',
//     // });
// }