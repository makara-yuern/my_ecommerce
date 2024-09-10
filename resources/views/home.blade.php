@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <!-- Hero Section -->
    <x-hero />

    <!-- Categories Section -->
    <x-categories :categories="$categories"/>

    <!-- New Arrivals Section -->
    <x-new-arrivals :newArrivals="$newArrivals"/>

    <!-- Featured Products Section -->
    <x-featured-products :featuredProducts="$featuredProducts"/>
@endsection
