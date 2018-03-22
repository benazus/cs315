# Python
# Parameter Correspondance & Default Values
def paraCorrDef(a, b, c = 67):
	print("paraCorrDef: a = {0}, b = {1}, c = {2}".format(a, b, c))
	return;

paraCorrDef(17, c = "5:}", b = 5)
paraCorrDef(9, "yH53-b", 88)
paraCorrDef("7-4Bjs7", b = 46)
paraCorrDef("berat", "bicer")
paraCorrDef(b = 5282, a = "iHyhN7/6%", c = 97)
paraCorrDef(b = 6465, a = 3314)
print ("\n")

# Variable number of arguments with tuples
def varArgs(*args):
	index = 0
	for var in args:
		print ("varArgs: var", index, " = ", var)
		index = index + 1
	return;

def varArgsDict(**args):
	for var in args.keys():
		print( "varArgsDict: ", var, " = ", args[var])
	return;

varArgs(1, 2, 3, 4, 5, 6)
varArgs(1, 2, 3)
print ("\n")

varArgsDict(a="1")
varArgsDict(a="1", b="2")
varArgsDict(a="1", b="2", c="3")
varArgsDict(a="1", b="2", c="3", d="4")
print ("\n")

# Parameter Passing
# Call by Object-Reference
def passMutable(x):
	x.append(5)
	x.append(7)
	x.append(87)
	print("passMutable: x = ", x)
	return;

def passChangeMutableRef(x):
	x = ["berat", "bicer", 21503050, "sec3"]
	print("passChangeMutableRef: x = ", x)
	return;

def passImmutableRef(x):
	x = x, ":)$83883 syje euejke 17728"
	print("passImmutableRef: x = : ", x)
	return;

var = ["126","26$2","2$2$2772"]
print("main of passMutable before: var = ", var)
passMutable(var)
print("main of passMutable after: var = ", var)
print ("\n")

var = ["126", "26$2", "2$2$2772"]
print("main of passChangeMutableRef before: var = ", var)
passChangeMutableRef(var)
print("main of passChangeMutableRef after: var = ", var)
print ("\n")

var = "beratbicer"
print("main of passImmutableRef before: var = ", var)
passImmutableRef(var)
print("main of passImmutableRef after: var = ", var)
print ("\n")
