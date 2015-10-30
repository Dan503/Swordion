<?php
  ini_set('include_path', $_SERVER['DOCUMENT_ROOT'].$GLOBALS['root_location'].'/includes/');

  // If additional GET variables are present, send them to the GSA
  if (count($_GET) > 1) {
    $search_url = 'http://searchapi.communications.gov.au/search?filter=url:%22annualreport.communications.gov.au/2015%22&' . http_build_query($_GET);
  } else {
    // Otherwise use the default parameters
    $search_url = 'http://searchapi.communications.gov.au/search?filter=url:%22annualreport.communications.gov.au/2015%22&q=' . urlencode($query);
  }

  // Get cURL resource
  $curl = curl_init();
  if (!$curl) {
      throw new Exception('cURL not working!');
  }
  // Set some options - we are passing in a useragent too here
  curl_setopt_array($curl, array(
      CURLOPT_RETURNTRANSFER => 1,
      CURLOPT_URL => $search_url,
      CURLOPT_USERAGENT => 'Annual Report search'
  ));
  // Send the request & save response to $resp
  $resp = curl_exec($curl);
  // Close request to clear up some resources
  curl_close($curl);
  // get JSON response
  $json = json_decode($resp, true);
  $GLOBALS['json'] = $json;

  // setup array of information needed to build the pagination
  $search_pagination = array(
    'count' => $json['count'],
    'offset' => $json['query']['offset'],
    'hits' => $json['query']['hits'],
    'results_displayed' => count($json['results']),
    'query_str' => http_build_query($_GET)
  );
  $search_pagination['first_index'] = ($search_pagination['count'] > 0 ? $search_pagination['offset'] + 1 : 0);
  $search_pagination['last_index'] = ($search_pagination['results_displayed'] > 0 ? $search_pagination['offset'] + $search_pagination['results_displayed'] : 0);
  $search_pagination['num_pages'] = intval(ceil($search_pagination['count'] / $search_pagination['hits']));
  $search_pagination['current_page'] = ($search_pagination['offset'] > 1 ? intval(ceil($search_pagination['offset'] / $search_pagination['hits'])) + 1 : 1);

  // create an array of regex patterns used to bold the keywords in the title
  $search_keywords = explode(' ', $json['query']['keywords']);
  foreach ($search_keywords as &$value) {
    $value = '/(' . $value . ')/i';
  }

  // function to output human-friendly file sizes
  function bytes_to_size($bytes) {
    $sizes = array('Bytes', 'KB', 'MB', 'GB', 'TB');
    if ($bytes === 0) return '';
    $i = intval(floor(log($bytes) / log(1024)));
    return round($bytes / pow(1024, $i), 2) . ' ' . $sizes[$i];
  }

  // build the pagination and output it
  function build_pagination($search_pagination, $length, $start) {
  	echo
	'<div class="pagination">
		<div class="nextPrevWrap">';

	    if (($search_pagination['current_page'] > $start) && ($search_pagination['results_displayed'] > 0)) {
	    	$href = preg_replace('/&offset=\d+/', '', $search_pagination['query_str']) . '&offset=' . strval($search_pagination['hits'] * ($search_pagination['current_page'] - 2));
	    	echo '
			<div class="pagination__prev pagination__nextPrev">
				<a class="pagination__prevLink pagination__nextPrevLink fancyLinks__exclusion" href="?'.$href.'"><span class="pagination__text">Previous</span></a>
			</div>';
	    }

	    if (($search_pagination['current_page'] < $length) && ($search_pagination['results_displayed'] > 0)) {
	    	$href = preg_replace('/&offset=\d+/', '', $search_pagination['query_str']) . '&offset=' . strval($search_pagination['hits'] * $search_pagination['current_page']);
	    	echo '
			<div class="pagination__next pagination__nextPrev">
				<a class="pagination__nextLink pagination__nextPrevLink fancyLinks__exclusion" href="?'.$href.'"><span class="pagination__text">Next</span></a>
			</div>';
	    }
		echo '
		</div>';

	  	echo '
		<div class="pagination__listWrap">
			<ol class="pagination__list TK-noDots grid">';

			    for ($i = $start; $i <= $length; $i++) {
			    	$isCurrent = $i === $search_pagination['current_page'];
			    	$currentItemClass = $isCurrent ? ' pagination__currentItem' : '';
			      echo
				  '<li class="pagination__item'.$currentItemClass.' grid__cell">';

				      if ($isCurrent) {
				        echo
						'<strong class="pagination__page pagination__current">
							<span class="pagination__text">' . $i . '</span>
						</strong>';

				      } else {
				      	$href = $i === 1 ?
							preg_replace('/&offset=\d+/', '', $search_pagination['query_str']) :
							preg_replace('/&offset=\d+/', '', $search_pagination['query_str']) . '&offset=' . strval($search_pagination['hits'] * ($i - 1));

				        echo
						'<a class="pagination__page pagination__link fancyLinks__exclusion" href="?'.$href.'" title="Jump to page '.$i.'">
							<span class="pagination__text">'.$i.'</span>
						</a>';
				      }

				  echo
				  '</li>';
			    }
			echo '
			</ol>
		</div>';


	echo
	'</div>';

  }

?>



    <?php
      function search_bar($index, $class = ''){
        echo
		'<form method="get" action="?" id="newSearch-'.$index.'" class="newSearch TK-relative">

			<input name="q" id="newSearch__input-'.$index.'" type="search" placeholder="New search term..." value="'.$GLOBALS['json']['query']['keywords'].'" class="newSearch__input" title="New search term" placeholder="Search the 2014&ndash;15 Annual Report" />
			<input type="submit" value="Search" class="TK-jsHide" />

			<a href="javascript:void(0)" title="" class="newSearch__submit tooltip fancyLinks__exclusion" data-jshook="search__trigger">
				<i class="icon-search newSearch__icon"></i>
				<span class="newSearch__tooltip tooltip__text tooltip__text--slim tooltip__text--align-bottom-center">Search</span>
				<span class="newSearch__btnBG"></span>
			</a>
		</form>';
      }

    // Start of the search results output
    echo '
    <div class="searchResults standardContent" id="search-results-body">';

      search_bar(1);

		echo '
	    <div class="searchResults__metaData standardContent">
	    ';

			echo
			'<p class="TK-centeredText">';

			    // If there are results, output the number of results shown on this results page
			    if ($search_pagination['count'] > 0) {
			      echo '
			          <span class="searchResults__metaDetails">
						  Results
				          <strong>' . $search_pagination['first_index'] . '</strong> -
				          <strong>' . $search_pagination['last_index'] . '</strong> of about
				          <strong>' . $search_pagination['count'] . '</strong> for
				          <strong>&ldquo;' . $json['query']['keywords'] . '&rdquo;</strong>.
				  	  </span>
			      ';
			    }

				// Output the time taken to process the search, in seconds
				echo '
				<span class="searchResults__speed">Search took <strong id="search_time">' . sprintf('%0.2f', $json['queryprocessingtime'] / 1000) . '</strong> seconds.</span>
			</p>

	    </div>
      ';
    // If there are results, format the fields and show the results
    if ($search_pagination['count'] > 0) {
      echo '
      <ol class="searchResults__list" start="'.$search_pagination['first_index'].'">
      ';
      // Loop through the results
      foreach ($json['results'] as $result) {
        $result_url = $result['fields']['url'];
        // Trim the URL by removing the protocol
        $trimmed_url = preg_replace('/(http|https):\/\//', '', $result_url);
        // Remove the site name suffix from the page title
        $result_title = str_replace('| 2014 Department of Communications Annual Report', '', $result['fields']['title']);
        // Add strong tags around keywords in the title
        $result_title = preg_replace($search_keywords, "<strong>$0</strong>", $result_title);
        // Replace the <ddd/> tags in the summary with ellipses
        $result_summary = preg_replace('/<ddd\/>/', ' <strong>&hellip;</strong> ', $result['fields']['summary']);
        // Replace the <c0></c0> tags in the summary with strong tags
        $result_summary = preg_replace('/c0>/', 'strong>', $result_summary);
        // Format the file sizes with a human-friendly string
        $result_size = bytes_to_size($result['fields']['size']);
        // Format the modified dates as DD-MM-YYYY
        $result_date = strftime('%d-%m-%Y', strtotime($result['fields']['modified']));

        // Output the HTML for each result
        echo '
		<li class="searchResults__item">
          <h3 class="searchResults__heading">
		  	<a class="searchResults__link" rank="' . $result['num'] . '" href="'.$result_url.'">
            ' . $result_title . '
          	</a>
		  </h3>
          <div class="searchResults__details">
            <p class="searchResults__summary">' . $result_summary . '</p>';
			/*<p class="searchResults__extras">
	            <span class="searchResults__urlSnippet">' . $trimmed_url . '</span>
	            <span class="searchResults__fileSize"> - ' . $result_size . '</span>
			</p>*/
		  echo '
          </div>
        </li>
        ';
      }
      echo '
      </ol><!-- .search-results -->
      ';
    }
    // Else if there are no results, display a friendly message asking the user to try again
    else {
      echo '
      <div class="searchResults__empty standardContent">
         <p>Your search - <strong>' . $json['query']['keywords'] . '</strong> - did not match any documents.</p>

         <p>No pages were found containing
            <strong>"' . $json['query']['keywords'] . '"</strong>.
         </p>

         <h2>Suggestions:</h2>
         <ul>
            <li>Make sure all words are spelled correctly.</li>
            <li>Try different keywords.</li>
            <li>Try more general keywords.</li>
         </ul>
      </div>
      ';
    }

    // Output the pagination
    // The pagination is a rolling list of up to 10 pages either side of the current page
	if ($search_pagination['num_pages'] != 1) {
	    if ($search_pagination['num_pages'] <= 10) {
	      build_pagination($search_pagination, $search_pagination['num_pages'], 1);
	    } elseif ($search_pagination['current_page'] < 12) {
	      build_pagination($search_pagination, $search_pagination['current_page'] + 9, 1);
	    } elseif (($search_pagination['current_page'] + 9) > $search_pagination['num_pages']) {
	      build_pagination($search_pagination, $search_pagination['num_pages'], -10 + $search_pagination['current_page']);
	    } else {
	      build_pagination($search_pagination, $search_pagination['current_page'] + 9, -10 + $search_pagination['current_page']);
	    }
	} ?>

   <?php /* <h2 class="newSearch__prompt TK-centeredText">Can&rsquo;t find what you are after? Try a new search term:</h2>

    <?php search_bar(2); ?>*/ ?>

<?php
echo '</div>';//#search-results-body
?>

