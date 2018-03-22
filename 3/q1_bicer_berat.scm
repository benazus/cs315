; Callee Function, fcall
(define (fcall list1 list2 list3)
	(if (null? list1)
		list3
		(fcall (cdr list1) (cdr list2) (append list3 (list (cons (car list1) (car list2)))))))

; Caller Function, pair-up
(define (pair-up list1 list2)
	(fcall list1 list2 '()))
