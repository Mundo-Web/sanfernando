@if (isset($breadcrumbs) && is_array($breadcrumbs) && count($breadcrumbs) > 0)
  <div class="bg-[#F8F8F8] py-7 2xl:py-8 flex items-center justify-center font-Montserrat_Medium w-full px-[5%] xl:px-[8%]">
    <nav aria-label="breadcrumb" class="flex gap-4 items-center w-full">
      <ol class="breadcrumb flex flex-row items-center gap-3">
        @foreach ($breadcrumbs as $index => $breadcrumb)
          @if ($index > 0)
            <li class="text-base mx-6 font-Montserrat_Medium">/</li>
          @endif
          @if ($loop->last)
            <li class="breadcrumb-item active text-base text-[#006BF6] font-Montserrat_Medium" aria-current="page">
              {{ $breadcrumb['title'] }}
            </li>
          @else
            <li class="breadcrumb-item text-base font-Montserrat_Medium"><a
                href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['title'] }}</a></li>
          @endif
        @endforeach
      </ol>
    </nav>
  </div>
@endif
