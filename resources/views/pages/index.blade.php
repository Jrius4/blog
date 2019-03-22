@extends('layouts.app')

@section('content')
<div>

        <header>
                <div class="overlay"></div>
                <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
                  <source src="{{asset('videos/video5.mp4')}}" type="video/mp4">
                </video>
                <div class="container h-100">
                  <div class="d-flex text-center h-100">
                    <div class="my-auto w-100 text-white">
                      <h1 class="display-3">Ndebi tech</h1>
                      <h2>let's talk tek</h2>
                    </div>
                  </div>
                </div>
              </header>

            <main>
                <section>
                        <div>
                                <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                  <div class="col-md-6 p-4 d-flex flex-column position-static">
                                    <strong class="d-inline-block mb-2 text-success">Design</strong>
                                    <h3 class="mb-0">Post title</h3>
                                    <div class="mb-1 text-muted">Nov 11</div>
                                    <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                                    <a href="#" class="stretched-link">Continue reading</a>
                                  </div>
                                  <div class="col-md-6 d-lg-block">
                                    <svg class="bd-placeholder-img" width="100%" height="auto" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                                  </div>
                                </div>
                              </div>
                </section>

                <section>

                </section>


            </main>
@endsection