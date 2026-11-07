

<li>
    <a href="#page" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
        <i class="fa fa-window-restore"></i>{{ __('Pages') }}
    </a>
    <ul class="collapse list-unstyled" id="page" data-parent="#accordion">
        <li>
            <a href="{{ route('admin.page.create') }}"><span><i class="fas fa-angle-double-right"></i>{{ __('Add Page') }}</span></a>
        </li>
        <li>
            <a href="{{ route('admin.page.index') }}"><span><i class="fas fa-angle-double-right"></i>{{ __('Pages') }}</span></a>
        </li>
    </ul>
</li>


<li>
    <a href="#menu2" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
        <i class="fa fa-folder-open"></i>{{ __('Categories') }}
    </a>
    <ul class="collapse list-unstyled" id="menu2" data-parent="#accordion">
        <li>
            <a href="{{ route('categories.index') }}"><span><i class="fas fa-angle-double-right"></i>{{ __('Categories') }}</span></a>
        </li>
        <li>
            <a href="{{ route('subcategories.index') }}"><span><i class="fas fa-angle-double-right"></i>{{ __('SubCategories') }}</span></a>
        </li>
    </ul>
</li>
<li>
    <a href="#geo" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
        <i class="fas fa-globe-asia"></i>{{ __('Location') }}
    </a>
    <ul class="collapse list-unstyled" id="geo" data-parent="#accordion">
        <li>
            <a href="{{ route('division.index') }}">
                <span><i class="fas fa-angle-double-right"></i>{{ __('Divisions') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ route('district.index') }}">
                <span><i class="fas fa-angle-double-right"></i>{{ __('Districts') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ route('upazila.index') }}">
                <span><i class="fas fa-angle-double-right"></i>{{ __('Upazilas') }}</span>
            </a>
        </li>
    </ul>
</li>


<li>
    <a href="{{ route('admin.post.format') }}" >
        <i class="fa fa-file"></i>{{ __('Add Post') }}
    </a>
</li>
 
<li>
    <a href="#poll" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
        <i class="fa fa-list"></i>{{ __('Polls') }}
    </a>
    <ul class="collapse list-unstyled" id="poll" data-parent="#accordion">
        <li>
            <a href="{{ route('addPolls.create') }}"><span><i class="fas fa-angle-double-right"></i>{{ __('Add Polls') }}</span></a>
        </li>
        <li>
            <a href="{{ route('addPolls.index') }}"><span><i class="fas fa-angle-double-right"></i>{{ __('Polls') }}</span></a>
        </li>
    </ul>
</li>



<li>
    <a href="{{ route('image.album.index') }}" >
        <i class="fas fa-image"></i>{{ __('Images Gallery') }}
    </a>
</li>


<li>
    <a href="#menu4" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
        <i class="fa fa-bars"></i>{{ __('Posts') }}
    </a>
    <ul class="collapse list-unstyled" id="menu4" data-parent="#accordion">
        <li>
            <a href="{{ route('post.index') }}"><span><i class="fas fa-angle-double-right"></i>{{ __('All Posts') }}</span></a>
        </li>
        <li>
            <a href="{{ route('slider.index') }}"><span><i class="fas fa-angle-double-right"></i>{{ __('Slider Posts') }}</span></a>
        </li>
        <li>
            <a href="{{ route('feature.index') }}"><span><i class="fas fa-angle-double-right"></i>{{ __('Featured Posts') }}</span></a>
        </li>
        <li>
            <a href="{{ route('breaking.index') }}"><span><i class="fas fa-angle-double-right"></i>{{ __('Breaking News') }}</span></a>
        </li>
        <li>
            <a href="{{ route('pending.index') }}"><span><i class="fas fa-angle-double-right"></i>{{ __('Pending Posts') }}</span></a>
        </li>

    </ul>
</li>

<li>
    <a href="{{ route('schedule.index') }}"><span><i class="fa fa-calendar" aria-hidden="true"></i>{{ __('Schedule Post') }}</span></a>
</li>



<li>
    <a href="{{ route('draft.index') }}"><span><i class="fab fa-firstdraft"></i>{{ __('Drafts') }}</span></a>
</li>


<li>
    <a href="#rss" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
        <i class="fas fa-rss"></i>{{ __('Rss Feeds') }}
    </a>
    <ul class="collapse list-unstyled" id="rss" data-parent="#accordion">
        <li>
            <a href="{{ route('rss.create') }}"><span><i class="fas fa-angle-double-right"></i>{{ __('Import Rss Feeds') }}</span></a>
        </li>
        <li>
            <a href="{{ route('rss.index') }}"><span><i class="fas fa-angle-double-right"></i>{{ __('Rss Feeds') }}</span></a>
        </li>
    </ul>
</li>

  
<li>
    <a href="#poll" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
        <i class="fa fa-list"></i>{{ __('Polls') }}
    </a>
    <ul class="collapse list-unstyled" id="poll" data-parent="#accordion">
        <li>
            <a href="{{ route('addPolls.create') }}"><span><i class="fas fa-angle-double-right"></i>{{ __('Add Polls') }}</span></a>
        </li>
        <li>
            <a href="{{ route('addPolls.index') }}"><span><i class="fas fa-angle-double-right"></i>{{ __('Polls') }}</span></a>
        </li>
    </ul>
</li>


<li>
    <a href="#widget" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
        <i class="fas fa-tachometer-alt"></i>{{ __('Widgets') }}
    </a>
    <ul class="collapse list-unstyled" id="widget" data-parent="#accordion">
        <li>
            <a href="{{ route('widget.create') }}"><span><i class="fas fa-angle-double-right"></i>{{ __('Add Widgets') }}</span></a>
        </li>
        <li>
            <a href="{{ route('widget.index') }}"><span><i class="fas fa-angle-double-right"></i>{{ __('Widgets') }}</span></a>
        </li>
        <li>
            <a href="{{ route('widget.settings') }}"><span><i class="fas fa-angle-double-right"></i>{{ __('Widget Settings') }}</span></a>
        </li>
    </ul>
</li>

 


 
<li>
    <a href="#menu9" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
        <i class="fa fa-envelope"></i>{{ __('NewsLetter') }}
    </a>
    <ul class="collapse list-unstyled" id="menu9" data-parent="#accordion">
        <li>
            <a href="{{ route('admin.subscriber.email') }}"><span><i class="fas fa-angle-double-right"></i>{{ __('Send Email') }}</span></a>
        </li>

        <li>
            <a href="{{ route('admin.subscriber.index') }}"><span><i class="fas fa-angle-double-right"></i>{{ __('All Subscribers') }}</span></a>
        </li>
    </ul>
</li>


<li>
    <a href="#menu10" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
        <i class="fa fa-language"></i>{{ __('Languages') }}
    </a>
    <ul class="collapse list-unstyled" id="menu10" data-parent="#accordion">
        <li>
            <a href="{{ route('admin.language.index') }}"><span><i class="fas fa-angle-double-right"></i>{{ __('Language') }}</span></a>
        </li>

        <li>
            <a href="{{ route('admin.admin_language.index') }}"><span><i class="fas fa-angle-double-right"></i>{{ __('Admin Language') }}</span></a>
        </li>
    </ul>
</li>



  
<li>
    <a href="#general" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
        <i class="fas fa-cogs"></i>{{__('General Settings')}}
    </a>
	

	
    <ul class="collapse list-unstyled" id="general" data-parent="#accordion">
	
	
		        <li>
            <a href="{{route('admin.generalsettings.websiteContent')}}"><span><i class="fas fa-angle-double-right"></i>{{__('Website settings & Adds')}}</span></a>
        </li>
        <li>
            <a href="{{route('admin.generalsettings.logo')}}"><span><i class="fas fa-angle-double-right"></i>{{__('Logo')}}</span></a>
        </li>
        <li>
            <a href="{{route('admin.languagelogo.index')}}"><span><i class="fas fa-angle-double-right"></i>{{__('Language Base Logo')}}</span></a>
        </li>
        <li>
            <a href="{{route('admin.generalsettings.favicon')}}"><span><i class="fas fa-angle-double-right"></i>{{__('Favicon')}}</span></a>
        </li>





    </ul>
</li>

<li>
    <a href="{{route('social.link.index')}}" class=" wave-effect"><i class="fas fa-paper-plane"></i>{{ __('Social Settings') }}</a>
</li>


   


  
<li>
    <a href="#emails" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
        <i class="fas fa-at"></i>{{__('Email Settings')}}
    </a>
    <ul class="collapse list-unstyled" id="emails" data-parent="#accordion">
        <li><a href="{{route('admin.email.config')}}"><span><i class="fas fa-angle-double-right"></i>{{__('Email Configurations')}}</span></a></li>  
    </ul>
</li>


<li>
    <a href="#seoTools" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
        <i class="fas fa-wrench"></i>{{__('SEO Tools')}}
    </a>
    <ul class="collapse list-unstyled" id="seoTools" data-parent="#accordion">
        <li>
            <a href="{{ route('seo.google.analytics') }}"><span><i class="fas fa-angle-double-right"></i>{{__('Google Analytics')}}</span></a>
        </li
        >
        <li>
            <a href="{{ route('seo.meta.keywords') }}"><span><i class="fas fa-angle-double-right"></i>{{__('Website Meta Keywords')}}</span></a>
        </li>
    </ul>
</li>

<li>
    <a href="{{ route('admin.sitemap.all') }}" class=" wave-effect"><i class="fas fa-sitemap"></i>{{ __('Site Map') }}</a>
</li>
   
<li>
    <a href="{{ route('fonts.index') }}" class=" wave-effect"><i class="fa fa-font"></i>{{ __('Font Option') }}</a>
</li>



<li>
    <a href="{{ route('admin.staff.index') }}" class=" wave-effect"><i class="fas fa-user-tag"></i>{{ __('Reporters') }}</a>
</li>  
{{-- লাইসেন্স ইনফরমেশন লিঙ্ক --}}
<li>
    <a href="{{ route('admin.license.info') }}" class="wave-effect">
        <i class="fas fa-certificate"></i>{{ __('License Info') }}
    </a>
</li>

<li>
    <a href="{{ route('admin.cache.clear') }}" class=" wave-effect"><i class="fa fa-database"></i>{{ __('Clear Cache') }}</a>
</li>    