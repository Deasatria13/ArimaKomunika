			var Stacks = {
				stack_top_right: {
					"dir1": "down",
					"dir2": "left",
					"push": "top",
					"spacing1": 10,
					"spacing2": 10
				},
				stack_top_left: {
					"dir1": "down",
					"dir2": "right",
					"push": "top",
					"spacing1": 10,
					"spacing2": 10
				},
				stack_bottom_left: {
					"dir1": "right",
					"dir2": "up",
					"push": "top",
					"spacing1": 10,
					"spacing2": 10
				},
				stack_bottom_right: {
					"dir1": "left",
					"dir2": "up",
					"push": "top",
					"spacing1": 10,
					"spacing2": 10
				},
				stack_bar_top: {
					"dir1": "down",
					"dir2": "right",
					"push": "top",
					"spacing1": 0,
					"spacing2": 0
				},
				stack_bar_bottom: {
					"dir1": "up",
					"dir2": "right",
					"spacing1": 0,
					"spacing2": 0
				},
				stack_context: {
					"dir1": "down",
					"dir2": "left",
					"context": $("#stack-context")
				},
			}
			
			function buat_pnotify(nt_style, nt_stack, pjg, pesan)
			{
				var noteStyle = nt_style;
				var noteOpacity = $(this).data('note-opacity');
				var noteStack = nt_stack;
				var width = pjg;

				var noteStack = noteStack ? noteStack : "stack_top_right";
				var noteOpacity = noteOpacity ? noteOpacity : "1";

				function findWidth() {
					if (noteStack == "stack_bar_top") 
					{
						return "100%";
					}
					else if (noteStack == "stack_bar_bottom") 
					{
						return "70%";
					} 
					else 
					{
						return width;
					}
				}

				new PNotify({
					title: "Notifikasi",
					text: pesan,
					opacity: noteOpacity,
					addclass: noteStack,
					type: noteStyle,
					stack: Stacks[noteStack],
					width: findWidth(),
					delay: 1400
				});

			}