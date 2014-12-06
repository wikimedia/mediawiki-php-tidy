find_path(TIDY_INCLUDE_DIR tidy.h PATH_SUFFIXES tidy)

if (NOT TIDY_INCLUDE_DIR)
    message(FATAL_ERROR "Unable to find tidy.h")
endif()

find_library(TIDY_LIBRARY tidy)
if (NOT TIDY_LIBRARY)
    message(FATAL_ERROR "Unable to find libtidy")
endif()

HHVM_EXTENSION(tidy ext_tidy.cpp)
HHVM_SYSTEMLIB(tidy ext_tidy.php)

HHVM_ADD_INCLUDES(tidy ${TIDY_INCLUDE_DIR})
HHVM_LINK_LIBRARIES(tidy ${TIDY_LIBRARY})

# set_target_properties(tidy PROPERTIES COMPILE_FLAGS -fpermissive)
