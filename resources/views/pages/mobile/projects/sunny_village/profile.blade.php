@extends('layouts.main')

@section('content')
<div class="pt-5" style="background: #2e2e2e;">
    <p class="text-center mt-5 page-heading"><b>Sunny Village</b></p>

    <div class="projects-container pb-5">
        <div class="project project-view">

            <div class="photos-list photos-slider slider">
                <div class="item photo">
                    <img src="/images/projects/sunny_village/sunny_village_1.jpg">
                </div>
                <div class="item photo">
                    <img src="/images/projects/sunny_village/sunny_village_2.jpg">
                </div>
                <div class="item photo">
                    <img src="/images/projects/sunny_village/sunny_village_3.jpg">
                </div>
                <div class="item photo">
                    <img src="/images/projects/sunny_village/sunny_village_4.jpg">
                </div>
                <div class="item photo">
                    <img src="/images/projects/sunny_village/sunny_village_5.jpg">
                </div>
                <div class="item photo">
                    <img src="/images/projects/sunny_village/sunny_village_6.jpg">
                </div>
            </div>

            <img src="/images/projects/sunny_village/sunny_village_map.png">
            <img src="/images/projects/sunny_village/sunny_village_plan.png" class="mt-3">

            <div class="page-text p-3" style="color:#fff;">
                <p class="text-center">ВИЛЛА <b>SUNNY VILLAGE</b> ЭТО:</p>
                <ul>
                    <li>Площадь виллы: 258 м<sup>2</sup></li>
                    <li>Рост цены после строительства: 30% и более</li>
                    <li>Площадь басейна: 32 м<sup>2</sup></li>
                    <li>Окупаемость: 6 лет</li>
                    <li>Потолки: 3 метра</li>
                    <li>Спальни: 3</li>
                    <li>Санузлы: 4</li>
                    <li>Ремонт: Есть</li>
                    <li>Нак рыше расположены: Сад, yoga area, chill zone с огнём</li>
                    <li>Итальянская мебель: Есть</li>
                    <li>Бытовая техника: Есть</li>
                    <li>Кабинет: Есть</li>
                    <li>Территория: Закрытая и охраняемая</li>
                </ul>
            </div>

            <div class="photos-list photos-slider slider">
                <div class="item photo">
                    <img src="/images/projects/sunny_village/sunny_village_villa_first_floor.png" style="height:auto;">
                </div>
                <div class="item photo">
                    <img src="/images/projects/sunny_village/sunny_village_villa_second_floor.png" style="height:auto;">
                </div>
                <div class="item photo">
                    <img src="/images/projects/sunny_village/sunny_village_villa_third_floor.png" style="height:auto;">
                </div>
            </div>
        </div>
        <a class="text-center d-block mb-3" style="text-decoration: underline;color: #1bc0db;" href="/downloads/sunny_village_presentation.pdf" download><i class="far fa-file-pdf"></i> Загрузить презентацию</a>
    </div>
</div>

<script>
    $('.photos-slider').slick({
        dots: true,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 2000,
        prevArrow: '<button id="prev" type="button" class="btn btn-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>',
        nextArrow: '<button id="next" type="button" class="btn btn-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>'
    });
</script>
@endsection
