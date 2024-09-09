@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <!-- Hero Section -->
    <x-hero />

    <!-- Categories Section -->
    <x-categories />

    <!-- Featured Products Section -->
    <x-featured-products :featuredProducts="$featuredProducts"/>
@endsection
