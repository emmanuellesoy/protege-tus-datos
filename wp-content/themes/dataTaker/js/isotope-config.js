jQuery(document).ready(function () { 

	// =======================================================================// 
	// Do not edit this code unless you know what you are doing!             //        
	// =====================================================================//

		// =======================================================================// 
		// Portfolio columns number                                              //        
		// =====================================================================//

			jQuery(function() {
			var container = $('#portfolio');
			var blogContainer = $('#blog, .hidden-post');
	
			function setColumns() { 
				var ww = $(window).width(); 
				
				if (ww > 1500) {
					columns = 6;
				} else if (ww > 1024) {
					columns = 4;
				} else if (ww > 767) {
					columns = 3;
				} else if (ww > 480) {
					columns = 2;
				} else if (ww > 239) {
					columns = 1;
				}
				
				return columns;
			}

		// =======================================================================// 
		// Blog columns number                                                   //        
		// =====================================================================//

			function setBlogColumns() { 
				var ww = $(window).width(); 
				
				if (ww > 1500) {
					blogColumns = 6;
				} else if (ww > 1024) {
					blogColumns = 4;
				} else if (ww > 480) {
					blogColumns = 3;
				} else if (ww > 239) {
					blogColumns = 2;
				}
				
				return blogColumns;
			}

		// =======================================================================// 
		// Set portfolio and blog sizes                                          //        
		// =====================================================================//

			function setItemSize() { 
				var ww = $(window).width(); 
				columns = setColumns(); 
				blogColumns = setBlogColumns(); 
				itemWidth = Math.floor(ww / columns);
				blogWidth = Math.floor(ww / blogColumns);
				var itemHeight = Math.floor(itemWidth * 0.75);
				var blogHeight = Math.floor(blogWidth * 0.75);
	
				container.find('article.portfolio, article.portfolio img').each(function () { 
					$(this).css( { 
						width : itemWidth + 'px' ,
						height : itemHeight + 'px' 
					});
				});
				blogContainer.find('article.post').each(function () { 
					$(this).css( { 
						width : blogWidth + 'px' ,
					});
				});
				blogContainer.find('article.post img').each(function () { 
					$(this).css( { 
						width : blogWidth + 'px' ,
						height : blogHeight + 'px' 
					});
				});
			}
	
			function setOverlay() { 
				var ww = $(window).width(); 
				columns = setColumns(); 
				itemWidth = Math.floor(ww / columns);
				itemHeight = Math.floor(itemWidth * 0.75);
	
				container.find('article.portfolio .portfolio-detail').each(function () { 
					$(this).css( { 
						width : itemWidth + 'px' ,
						height : itemHeight + 'px',
						top : -itemHeight + 'px' 
					});
				});
			}
	
		// =======================================================================// 
		// Portfolio filters                                                     //        
		// =====================================================================//

			$('.portfolio-filters a').click(function () { 
					var selector = $(this).attr('data-filter');
					$('.selected').removeClass('selected');
					$(this).removeClass('selected').addClass('selected');
						
						container.isotope( { 
							filter : selector 
						});
						
						setTimeout(function () { 
							reArrangeProjects();
						}, 500);
						return false;
					});
	
			function reArrangeItems() { 
				setItemSize(),
				setOverlay(),
				container.isotope('reLayout');
				blogContainer.isotope('reLayout');
			}
			
			container.imagesLoaded(function () { 
				setItemSize(),
				setOverlay(),
				container.isotope( { 
					itemSelector : 'article.portfolio', 
					layoutMode : 'masonry', 
					resizable : false 
				} );
				blogContainer.isotope( { 
					itemSelector : 'article.post', 
					layoutMode : 'masonry', 
					resizable : false 
				} );
			} );
		
			$(window).resize(function() { 
				reArrangeItems();
				
			} );
		});
		
}); // End Document Ready
