ymaps.ready(init);
    function init(){
        // Создание карты.
        var myMap = new ymaps.Map("map", {
            // Координаты центра карты.
            // Порядок по умолчанию: «широта, долгота».
            // Чтобы не определять координаты центра карты вручную,
            // воспользуйтесь инструментом Определение координат.
            center: [55.19831862068815,61.32016475065578],
            // Уровень масштабирования. Допустимые значения:
            // от 0 (весь мир) до 19.
            zoom: 7
        });
        
        function addPlacemark(lat, lng) {
            // Создание метки с заданными координатами
            var placemark = new ymaps.Placemark([lat, lng], {
                // Указываем хинт на метке
                hintContent: 'Метка'
            }, {
                // Опции метки - цвет, размер, возможность перетаскивания
                iconColor: '#ff0000', 
                iconLayout: 'default#image',
                iconImageHref: 'img/user-solid.svg',
                iconImageSize: [48, 48],
                draggable: false
            });
        
            // Добавление метки на карту
            map.geoObjects.add(placemark);
        }
    }

    var block = document.querySelector('.block').getAttribute('data-attr');

    alert(block);



