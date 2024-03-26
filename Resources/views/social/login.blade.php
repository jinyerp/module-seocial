<div>
    <span>Sign in with your social network.</span>
    {{-- Social Login Link --}}
    @if(count($provider)>0)
        @foreach($provider as $item)

        <div class="d-grid mt-3">
            <a href="{{route('oauth-redirect',$item->name)}}" class="btn btn-google">
                <span class="me-3">
                    @includeIf("social::icons.".$item->name)
                </span>
                Continue with {{ $item->name }}
            </a>
        </div>
        @endforeach
    @endif

</div>
