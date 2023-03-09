@extends('layouts.main')

@section('content')
<div class="pt-5" style="background: #2e2e2e;">
    <p class="text-center mt-5 page-heading"><b>Sunny Apartments</b></p>

    <div class="projects-container pb-5">
        <div class="project project-view">

            <div class="photos-list photos-slider slider">
                <div class="item photo">
                    <img src="/images/projects/sunny_apartments/sunny_apartments_1.jpg">
                </div>
                <div class="item photo">
                    <img src="/images/projects/sunny_apartments/sunny_apartments_2.jpg">
                </div>
                <div class="item photo">
                    <img src="/images/projects/sunny_apartments/sunny_apartments_3.jpg">
                </div>
                <div class="item photo">
                    <img src="/images/projects/sunny_apartments/sunny_apartments_4.jpg">
                </div>
                <div class="item photo">
                    <img src="/images/projects/sunny_apartments/sunny_apartments_5.jpg">
                </div>
            </div>

            <img src="/images/projects/sunny_apartments/sunny_apartments_plan.png" class="mt-3">

            <div class="page-text p-3" style="color:#fff;">
                <p class="text-center">АПАРТАМЕНТЫ <b>SUNNY APARTMENTS</b> ЭТО:</p>
                <ul>
                    <li>Площадь территории: 14,17 соток</li>
                    <li>Этажность: 5</li>
                    <li>Парковка: Есть</li>
                    <li>Ремонт: Есть</li>
                    <li>На крыше расположены: Басейн, lounge-зона, кинотеатр</li>
                    <li>Итальянская мебель: Есть</li>
                    <li>Бытовая техника: Есть</li>
                    <li>Территория: Закрытая и охраняемая</li>
                </ul>
            </div>

            <div class="photos-list photos-slider slider">
                <div class="item photo">
                    <img src="/images/projects/sunny_apartments/sunny_apartments_plan_1.png" style="height:auto;">
                </div>
                <div class="item photo">
                    <img src="/images/projects/sunny_apartments/sunny_apartments_plan_2.png" style="height:auto;">
                </div>
                <div class="item photo">
                    <img src="/images/projects/sunny_apartments/sunny_apartments_plan_3.png" style="height:auto;">
                </div>
                <div class="item photo">
                    <img src="/images/projects/sunny_apartments/sunny_apartments_plan_4.png" style="height:auto;">
                </div>
            </div>
        </div>
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
