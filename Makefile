all:
	cd ../../..;zip -ru com_localise.zip * -x \*~ -x Makefile -x \*.sh -x \*/.\* -x com_localise.zip;cd administrator/components/com_localise
	zip -ru ../../../com_localise.zip localise.xml

