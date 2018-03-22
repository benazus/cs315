(define (deep-remove item ls)
	(cond
		((null? item) #f)
		((list? item) #f)
		((null? ls) '())
		((and (not (list? (car ls))) (equal? (car ls) item)) (deep-remove item (cdr ls)))
		((and (not (list? (car ls))) (not (equal? (car ls) item))) (cons (car ls) (deep-remove item (cdr ls))))
		((list? (car ls)) (cons	(deep-remove item (car ls)) (deep-remove item (cdr ls))))))
