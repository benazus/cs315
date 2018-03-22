a = 0
b = 0
c = 0

def function1():
	a = 123 # A local variable defined statically
	b = 456 # A local variable defined statically
	c = 789 # A local variable defined statically
	print("In function1, a = {} & b = {} & c = {}".format(a,b,c)) # Uses local a, b & c of function1 which are local variables
	
	def function2():
		global a # Global keyword means this a is global a
		nonlocal b # Nonlocal b means this is the first b definition encountered in function2's parents, in this case its b of function1
		c = 6776 # A local variable defined statically
		
		print("In function2-1, a = {} & b = {} & c = {}".format(a,b,c)) # Uses global a, b of function1 & c of function2 which is local
		
		def function3():
			global b # This is global b
			nonlocal c # This is c of function2 since the first definition of c as we look larger scopes upwards is found in function2
			a = 9449 # A local variable defined statically
			print("In function3, a = {} & b = {} & c = {}".format(a,b,c)) # Uses a of function3 which is local, b of global & c of function2
			return;
		
		function3()		
		print("In function2-2, a = {} & b = {} & c = {}".format(a,b,c)) # Uses global a, b of function1 & c of function2 which is local
		return;
		
	function2()
	print("In function1-2, a = {} & b = {} & c = {}".format(a,b,c)) # Uses a, b & c of function1 which are local variables
	return;

print("In main-1, a = {} & b = {} & c = {}".format(a,b,c)); # Uses global a,b & c
function1()
print("In main-2, a = {} & b = {} & c = {}".format(a,b,c)); # Uses global a,b & c
