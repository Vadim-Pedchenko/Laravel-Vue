@extends('nonprofits.layout')

@section('page_id', 'nonprofit-admin-employees-index')

@section('page-header')
	<div class="page-header">
		<h2>Employees</h2>
	</div>
@stop

@section('content')
	<div class="two-columns">
		@include('nonprofits.employees.index._sidebar')
		
		<div class="single-column">
		<simple-feed
			resource-url="{{ route('api.nonprofits.employees', $authNonprofit->id) }}"
			no-results="There are no employees matching your criteria."
			inline-template>
			<div v-cloak>

				{{-- filters --}}
				<div class="feed-filters flex-columns">
					<div class="filters-group column column--grow-1">
						<div class="field--text">
							<input type="text" v-bind:value="filters.search" @input="updateSearchQuery" placeholder="Search employees...">
						</div>
					</div>
				</div>
				
				{{-- feed --}}
				<div class="list">
					<ul>
						<template v-for="item in items">
							@include('nonprofits.employees.index._list-item')
						</template>
					</ul>
					<div class="list-item no-results" v-show="!items.length && !loading">
						@{{ noResults }}
					</div>
					@include('app.components.loading')
					@include('app.components.feeds.load-more')
				</div>

			</div>
		</simple-feed>
		</div>
	</div>
@stop